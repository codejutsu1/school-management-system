<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class PrincipalsTable extends Component
{
    public function render()
    {
        return view('livewire.principals-table', [
            'users' => User::role('vice principal')->get()
        ]);
    }
}
