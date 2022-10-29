<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class TeachersTable extends Component
{
    public function render()
    {
        return view('livewire.teachers-table', [
            'users' => User::role('teacher')->get()
        ]);
    }
}
