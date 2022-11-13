<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ParentRegister extends Component
{
    public $firstName = '';
    public $middleName = '';
    public $lastName = '';
    public $email = ''; 
    
    public function render()
    {
        return view('livewire.parent-register');
    }
}
