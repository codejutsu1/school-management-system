<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function payment()
    {
        
    }
}
