<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function resultIndividually()
    {
        return view('superAdmin/Results/result-individually');
    }

    public function resultBySubject()
    {
        return view('superAdmin/Results/result-subject');
    }
}
