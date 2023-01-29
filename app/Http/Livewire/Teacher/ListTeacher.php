<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Teacher;
use Livewire\Component;

class ListTeacher extends Component
{
    public $department;
    public $teachers;
    public $teacherWithNoClass;

    public function mount()
    {
        $this->department = Teacher::where('user_id', Auth()->user()->id)->value('department');

        $this->teachers =  Teacher::where('department', $this->department)
                                    ->join('users', 'users.id', '=', 'teachers.user_id')
                                    ->join('subject_teachers', 'subject_teachers.user_id', '=', 'users.id')
                                    ->select(['users.id', 'users.name', 'users.email', 'users.slug','teachers.department', 'subject_teachers.classes'])
                                    // ->where('teachers.department', $this->department)
                                    ->get();

        
    }

    public function render()
    {
        return view('livewire.teacher.list-teacher');
    }
}
