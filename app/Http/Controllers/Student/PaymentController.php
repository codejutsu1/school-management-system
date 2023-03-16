<?php

namespace App\Http\Controllers\Student;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Iamolayemi\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    public function schoolFees()
    {
        return view('student/fees/school-fees');
    }

    public function otherFees()
    {
        return view('student/fees/other-fees');
    }

    public function callback()
    {
        // get reference  from request
        $reference = request('reference') ?? request('trxref');

        // verify payment details
        $payment = Paystack::transaction()->verify($reference)->response('data');

        // check payment status
        if ($payment['status'] == 'success') {
            Transaction::create([
                'user_id' => $payment['metadata']['user_id'],
                'title' => $payment['metadata']['title'],
                'reference' => $payment['reference'],
                'amount' => $payment['amount']/100,
                'class' => $payment['metadata']['class'],
                'status' => $payment['status'],
                'confirmed' => 1,
                'session' => $payment['metadata']['session'],
                $payment['metadata']['form'] => 1
            ]);

            return redirect()->route($payment['metadata']['route'])->with('message', 'Payment Successful');
        } else {
            // payment is not successful
            return redirect()->route($payment['metadata']['route'])->with('message', 'Payment not Successful');
        }
    }

}
