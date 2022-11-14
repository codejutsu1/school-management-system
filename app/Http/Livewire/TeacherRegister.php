<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;
use LivewireUI\Modal\ModalComponent;

class TeacherRegister extends ModalComponent
{
    public function render()
    {
        dd(Department::all());
        return view('livewire.teacher-register', ['departments' => Department::pluck('name')]);
    }
}
