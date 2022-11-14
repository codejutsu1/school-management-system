<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ParentRegister extends ModalComponent
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
