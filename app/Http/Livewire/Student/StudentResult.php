<?php

namespace App\Http\Livewire\Student;

use App\Machine\Result;
use Livewire\Component;
use App\Models\SubjectClass;

class StudentResult extends Component
{
    public $student_class;
    public $classes;
    public $session;
    public $final_results = [];

    public function mount()
    {
        $this->classes = SubjectClass::pluck('name');
    }

    public function render()
    {
        if($this->student_class && $this->session)
        {
            $this->final_results = (new Result)->displayStudentResult($this->student_class, $this->session, auth()->user()->id);
        }
        return view('livewire.student.student-result');
    }
}
