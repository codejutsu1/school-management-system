<?php

namespace App\Http\Livewire\Result;

use App\Machine\Result;
use Livewire\Component;
use App\Models\Department;
use App\Models\SubjectClass;

class BySubject extends Component
{
    public $student_subject;
    public $student_class;
    public $subjects;
    public $session;
    public $classes;
    public $final_results;

    public function mount()
    {
        $this->subjects = Department::pluck('name');

        $this->classes = SubjectClass::pluck('name');
    }

    public function render()
    {
        if($this->session && $this->student_subject && $this->student_class){
            $this->final_results = (new Result())->studentsResult($this->session, $this->student_subject, $this->student_class);
        }

        return view('livewire.result.by-subject');
    }
}
