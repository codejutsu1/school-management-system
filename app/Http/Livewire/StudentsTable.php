<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;

class StudentsTable extends Component
{
    public function render()
    {
        return view('livewire.students-table', [
            'users' => User::role('student')->get()
        ]);
    }
}
