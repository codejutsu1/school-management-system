<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Jss1;
use App\Models\Student;
use Livewire\Component;

class ShowStudents extends Component
{
    public $classes;
    public $session;
    public $formClass;
    public $students;

    public function mount()
    {
        if($this->classes) 
        {
            $this->formClass = $this->classes[-1];
            $this->students = Jss1::where('classes', $this->formClass)->get();
        }
    }

    public function render()
    {
        return view('livewire.teacher.show-students');
    }
}
