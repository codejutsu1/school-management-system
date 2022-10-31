<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function viewStudentInfo()
    {
        return view('student/studentInfo');
    }
}
