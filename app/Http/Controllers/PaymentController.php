<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment');
    }

    public function processPayment(Request $request)
    {
    	// 0 for failure, 1 for success
        $paymentStatus = rand(0, 1);

        $transactionDetails = [
            'transaction_id' => uniqid(),
            'user_id' => $request->input('user_id'),
            'amount' => $request->input('amount'),
            'status' => $paymentStatus ? 'success' : 'failure',
        ];

        // Save to the database
        \DB::table('payments')->insert($transactionDetails);

        return redirect('/payment')->with('status', $paymentStatus ? 'success' : 'failure');
    }

}
