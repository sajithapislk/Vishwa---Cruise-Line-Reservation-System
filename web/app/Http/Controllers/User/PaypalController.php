<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CompanyWallet;
use App\Models\Books;
use App\Models\CruiseCompanyWallet;
use App\Models\Payment;
use App\Models\TempDeal;
use App\Models\UpcomingReservations;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PaypalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('transaction');
    }
    public  function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        $uniqueCode = $this->generateRandomString();
        $upcomingDeal = UpcomingReservations::find($request->id);

        $price = $request->qty * $upcomingDeal->price;

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken()['access_token'];

        $payment = Payment::create([
            'method'=>'paypal',
            'status'=>'PENDING',
            'amount'=>$price,
            'token'=>$uniqueCode,
        ]);
        TempDeal::create([
            'ud_id'=>$upcomingDeal->id,
            'payment_id'=>$payment->id
        ]);

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "reference_id" => $uniqueCode,
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $price
                    ]
                ]
            ]
        ]);
        // dd($response);
        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return $links['href'];
                }
            }
            return redirect()
                ->route('patient.booking.paypal.cancel_transaction')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('patient.booking.paypal.cancel_transaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $userId = Auth::id();

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        $token = $response['purchase_units'][0]['reference_id'];
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $payment = Payment::where('token',$token)->first();

            $payment->update([
                'status'=>'SUCCESS',
                'response'=>$response
            ]);

            $tempDeal = TempDeal::where('payment_id', $payment->id)->first();

            $cruiseLine = Books::create([
                'ud_id'=>$tempDeal->ud_id,
                'user_id'=>$userId,
                'payment_id'=> $payment->id,
                'status'=>"PAYMENT DONE"
            ]);

            CompanyWallet::create([
                'ref' => $cruiseLine->id,
                'name' => 'cruise_deals',
                'debit' => $payment->amount,
            ]);

            CruiseCompanyWallet::create([
                'ref' => $cruiseLine->id,
                'name' => 'cruise_deals',
                'credit' => $payment->amount,
            ]);

            return Inertia::render("User/PaymentSuccess");
        } else {
            return "error";
        }
    }
    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    function pdf($id) {
        $cruiseDeal = Books::with(['deal','available_room','user','payment'])->find($id);
        // return $cruiseDeal;
        return view('PDF.invoice',compact('cruiseDeal'));
    }
    function pdf_download($id) {
        $cruiseDeal = Books::with(['deal','available_room','user','payment'])->find($id);
        // return $cruiseDeal;
        // return view('PDF.invoice',compact('cruiseDeal'));
        $pdf = Pdf::loadview('pdf.invoice', [
            'cruiseDeal' => $cruiseDeal
        ]);
        $orientation = 'landscape';
        $customPaper = array(0,0,950,950);
        $pdf->setPaper($customPaper, $orientation);
        return $pdf->stream();

    }
}
