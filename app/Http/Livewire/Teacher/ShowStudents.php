<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Student;
use Livewire\Component;

class ShowStudents extends Component
{
    public $classes;
    public $session;

    public function mount()
    {
        $this->students = Jss1::with('user')->all();
    }

    public function render()
    {
        return view('livewire.teacher.show-students');
    }
}
