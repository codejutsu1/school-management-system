<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;

class ParentsTable extends Component
{
    public function render()
    {
        return view('livewire.parents-table', [
            'users' => User::role('parent')->get()
        ]);
    }
}
