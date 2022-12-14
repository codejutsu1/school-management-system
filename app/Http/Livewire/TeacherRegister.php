<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Teacher;
use Livewire\Component;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class TeacherRegister extends ModalComponent
{
    public $firstName;
    public $middleName;
    public $lastName;
    public $email;
    public $department = '';
    
    protected $rules = [
        'firstName' => 'required|string',
        'lastName' => 'required|string',
        'middleName' => 'required|string',
        'email' => 'required|email|unique:users',
        'department' => 'required|string'
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

        $user->assignRole('teacher');

        Teacher::create([
            'user_id' => $user->id,
            'department' => $this->department,
        ]);

        session()->flash('message', 'A new teacher has been registered successfully.');

        return redirect()->route('teachers.index');
    }

    public function render()
    {
        return view('livewire.teacher-register', ['departments' => Department::pluck('name')]);
    }
}
