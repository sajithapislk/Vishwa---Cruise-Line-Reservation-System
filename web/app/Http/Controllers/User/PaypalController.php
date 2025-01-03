<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\PaymentInvoice;
use App\Models\CompanyWallet;
use App\Models\Book;
use App\Models\CruiseCompanyWallet;
use App\Models\Payment;
use App\Models\TempDeal;
use App\Models\UpcomingReservations;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
        DB::beginTransaction();
        try {

            $uniqueCode = $this->generateRandomString();
            $upcomingDeal = UpcomingReservations::find($request->id);

            $price = ($request->qty * $upcomingDeal->price) + (count($request->selectedRooms) * $upcomingDeal->tax);

            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken()['access_token'];

            $payment = Payment::create([
                'method' => 'paypal',
                'status' => 'PENDING',
                'amount' => $price,
                'token' => $uniqueCode,
            ]);
            TempDeal::create([
                'ur_id' => $upcomingDeal->id,
                'payment_id' => $payment->id,
                'selected_rooms' => $request->selectedRooms
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
                        DB::commit();
                        return $links['href'];
                    }
                }
                DB::rollBack();
                return redirect()
                    ->route('cancelTransaction')
                    ->with('error', 'Something went wrong.');
            } else {
                DB::rollBack();
                return redirect()
                    ->route('cancelTransaction')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('patient.booking.paypal.cancel_transaction')
                ->with('error', 'Something went wrong.');
        }
    }
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $user = Auth::user();

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        $token = $response['purchase_units'][0]['reference_id'];
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $payment = Payment::where('token', $token)->first();

            $payment->update([
                'status' => 'SUCCESS',
                'response' => $response
            ]);

            $tempDeal = TempDeal::where('payment_id', $payment->id)->first();

            $book = Book::create([
                'ur_id' => $tempDeal->ur_id,
                'user_id' => $user->id,
                'payment_id' => $payment->id,
                'status' => "PAYMENT DONE",
                'booked_rooms' => json_encode($tempDeal->selected_rooms)
            ]);


            CompanyWallet::create([
                'ref' => $book->id,
                'name' => 'cruise_deals',
                'debit' => $payment->amount,
            ]);

            CruiseCompanyWallet::create([
                'ref' => $book->id,
                'name' => 'cruise_deals',
                'credit' => $payment->amount,
            ]);
            $bookWithInfo = $book->with(['reservation', 'user', 'payment'])->first();
            Mail::to($user->email)->send(new PaymentInvoice($bookWithInfo));

            return Inertia::render("User/PaymentSuccess", [
                'id' => $book->id
            ]);
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

    public function pdf($id)
    {
        $cruiseDeal = Book::with(['reservation', 'user', 'payment'])->find($id);
        // return $cruiseDeal;
        return view('PDF.invoice', compact('cruiseDeal'));
    }
    public function pdf_download($id)
    {
        $cruiseDeal = Book::with(['reservation', 'user', 'payment'])->find($id);
        // return $cruiseDeal;
        // return view('PDF.invoice',compact('cruiseDeal'));
        $pdf = Pdf::loadview('pdf.invoice', [
            'cruiseDeal' => $cruiseDeal
        ]);
        $orientation = 'landscape';
        $customPaper = array(0, 0, 950, 950);
        $pdf->setPaper($customPaper, $orientation);
        return $pdf->stream();
    }
    /**
     * Refund a PayPal payment.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function refundTransaction(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'transaction_id' => 'required|string', // Capture ID or Order ID
            'amount' => 'nullable|numeric',        // Optional for partial refund
            'currency' => 'nullable|string',       // Optional, defaults to USD
        ]);

        // Get the PayPal Client
        $provider = new PayPalClient;

        // Set PayPal API credentials
        $provider->setApiCredentials(config('paypal'));

        // Get Access Token
        $provider->getAccessToken();

        // Retrieve the transaction ID and other relevant data from the request
        $transactionId = $request->input('transaction_id'); // Capture ID
        $amount = $request->input('amount');                // Optional for partial refund
        $currency = $request->input('currency', 'USD');     // Default is USD

        // Prepare refund data
        $refundData = [
            'amount' => [
                'value' => $amount ?? '0.00',  // If no amount is provided, it refunds the full transaction
                'currency_code' => $currency,
            ],
        ];

        try {
            // Call the refund API
            $response = $provider->refundCapturedPayment($transactionId, $refundData);

            // Check if the refund was completed successfully
            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                // Update payment record in the database (if applicable)
                $payment = Payment::where('transaction_id', $transactionId)->first();
                if ($payment) {
                    $payment->update([
                        'status' => 'REFUNDED',
                        'refund_response' => $response,
                    ]);
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Payment refunded successfully',
                    'response' => $response,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Refund failed',
                    'response' => $response,
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
