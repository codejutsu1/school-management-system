<?php

namespace App\Http\Livewire\Result;

use App\Machine\Result;
use Livewire\Component;
use App\Models\Department;
use App\Models\SubjectClass;

class StudentResult extends Component
{
    public $subjects;
    public $student_subject;
    public $session;
    public $form_class;
    public $final_results;

    public function mount()
    {
        $this->subjects = Department::pluck('name');

        $classes = SubjectClass::pluck('name')->toArray();

        $name = Auth()->user()->getDirectPermissions()->pluck('name')->toArray();

        $this->form_class = array_intersect($classes, $name);

        $this->form_class = reset($this->form_class);
    }

    public function render()
    {
        if($this->session and $this->student_subject)
        {
            $result = new Result();

            $this->final_results = $result->studentsResult($this->session, $this->student_subject, $this->form_class);
        }

        return view('livewire.result.student-result');
    }
}
