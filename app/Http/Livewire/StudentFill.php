<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StudentFill extends Component
{
    public $state = '';
    public $lga = '';

    public function render()
    {
        return view('livewire.student-fill');
    }
}
