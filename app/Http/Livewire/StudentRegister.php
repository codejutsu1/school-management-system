<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class StudentRegister extends ModalComponent
{
    public $firstName = ''; 
    public $lastName = '';
    public $middleName = '';
    public $email ='';
    public $class = ''; 

    protected $rules = [
        'firstName' => 'required|string',
        'lastName' => 'required|string',
        'middleName' => 'required|string',
        'email' => 'required|email|unique:users',
        'class' => 'required|string'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $name = $this->lastName . ' ' . $this->firstName . ' ' . $this->middleName;

        $user = User::create([
            'name' => $name,
            'email' => $this->email,
            'password' => Hash::make($this->email),
            'slug' => slugify($name)
        ]);

        $user->assignRole('student');

        Student::create([
            'user_id' => $user->id,
            'class' => $this->class,
        ]);

        session()->flash('message', 'A new Student has been registered successfully.');

        return redirect()->route('students.index');
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

    public function render()
    {
        return view('livewire.student-register');
    }
}
