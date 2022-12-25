<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function viewTeacherInfo()
    {
        return view('teacher/teacherInfo');
    }
}
