<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CruiseDeal;
use App\Models\Payment;
use App\Models\UpcomingDeal;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Barryvdh\DomPDF\Facade\Pdf;
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
    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        $upcomingDeal = UpcomingDeal::find($request->id);

        $price = $request->qty * $upcomingDeal->price;

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken()['access_token'];

        Payment::create([
            'method'=>'paypal',
            'status'=>'PENDING',
            'amount'=>$price,
            'token'=>$paypalToken,
        ]);

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "reference_id" => $paypalToken,
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
                    return redirect()->away($links['href']);
                }
            }

            // return redirect()
            //     ->route('patient.booking.paypal.cancel_transaction')
            //     ->with('error', 'Something went wrong.');


            return Inertia::render('ErrorPage', ['error' => 'Something went wrong.']);
        } else {
            // return redirect()
            //     ->route('patient.booking.paypal.cancel_transaction')
            //     ->with('error', $response['message'] ?? 'Something went wrong.');


            return Inertia::render('ErrorPage', ['error' => 'Something went wrong.']);
        }
    }
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $payment = Payment::where('token',$paypalToken)->first();
            $payment->update([
                'status'=>'SUCCESS',
                'response'=>$response
            ]);
            return redirect()
                ->route('createTransaction')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
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
        $cruiseDeal = CruiseDeal::with(['deal','available_room','user','payment'])->find($id);
        // return $cruiseDeal;
        return view('PDF.invoice',compact('cruiseDeal'));
    }
    function pdf_download($id) {
        $cruiseDeal = CruiseDeal::with(['deal','available_room','user','payment'])->find($id);
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
