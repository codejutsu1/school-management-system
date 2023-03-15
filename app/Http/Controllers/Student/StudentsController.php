<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{
    public function viewStudentInfo()
    {
        return view('student/studentInfo');
    }

    public function studentProfile()
    {
        $student = Student::join('users', 'users.id', '=', 'students.user_id')
                            ->select(['users.id', 'users.name', 'users.email', 'students.gender', 'students.dob', 'students.extraCurriculumActivities', 'students.house', 'students.class'])
                            ->where('users.id', auth()->user()->id)
                            ->first();
                            
        return view('student/student-profile', compact('student'));
    }
}
