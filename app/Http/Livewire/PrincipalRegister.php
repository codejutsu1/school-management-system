<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class PrincipalRegister extends ModalComponent
{
    public $firstName;
    public $lastName;
    public $middleName;
    public $email;

    protected $rules = [
        'firstName' => 'required|string',
        'lastName' => 'required|string',
        'middleName' => 'required|string',
        'email' => 'required|email|unique:users',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $name = fullname($this->lastName, $this->firstName, $this->middleName);

        $user = User::create([
            'name' => $name,
            'email' => $this->email,
            'password' => Hash::make($this->email),
            'slug' => slugify($name)
        ]);

        $user->assignRole('vice principal');

        session()->flash('message', 'A new vice principal has been registered successfully.');

        return redirect()->route('principals.index');
    }

    public function render()
    {
        return view('livewire.principal-register');
    }
}
