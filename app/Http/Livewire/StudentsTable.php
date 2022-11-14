<?php

namespace App\Http\Livewire;

use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;

class StudentsTable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.students-table', [
            'users' => User::role('student')->paginate(10)
        ]);
    }
}
