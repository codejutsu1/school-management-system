<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;

class ShowStudents extends Component
{
    public $classes;

    public function updating($field, $value)
    {
        if($value == NULL)
        {
            dd('true');
        }
    }

    public function render()
    {
        return view('livewire.teacher.show-students');
    }
}
