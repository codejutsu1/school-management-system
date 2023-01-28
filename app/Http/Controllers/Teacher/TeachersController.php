<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use App\Models\SubjectClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeachersController extends Controller
{
    public function viewTeacherInfo()
    {
        return view('teacher/teacherInfo');
    }

    public function listTeachers()
    {
        return view('teacher/listTeacher');
    }

    public function showListTeachers(User $teacher)
    {
        $classes = SubjectClass::pluck('name');
        return view('teacher/showListTeacher', compact('teacher', 'classes'));
    }
}
