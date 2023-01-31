<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Teacher;
use Livewire\Component;
use App\Models\SubjectTeacher;

class ListTeacher extends Component
{
    public $department;
    public $teachers;
    public $subject_teachers_id;
    public $teachers_id;
    public $teachers_without_subject;

    public function mount()
    {
        $this->department = Teacher::where('user_id', Auth()->user()->id)->value('department');

        $this->teachers =  Teacher::where('department', $this->department)
                                    ->join('users', 'users.id', '=', 'teachers.user_id')
                                    ->join('subject_teachers', 'subject_teachers.user_id', '=', 'users.id')
                                    ->select(['users.id', 'users.name', 'users.email', 'users.slug', 'subject_teachers.classes','teachers.department'])
                                    ->get();

        $this->subject_teachers_id = SubjectTeacher::where('subject', $this->department)
                                                    ->pluck('user_id')
                                                    ->toArray();
                                
        $this->teachers_id  = Teacher::where('department', $this->department)
                                    ->pluck('user_id')
                                    ->toArray();

        $this->teachers_without_subject = array_diff($this->teachers_id, $this->subject_teachers_id);

        $this->teachers_without = Teacher::with('user')
                                        ->whereIn('user_id', $this->teachers_without_subject)
                                        ->select('user_id', 'department')
                                        ->get();
    }

    public function render()
    {
        return view('livewire.teacher.list-teacher');
    }
}
