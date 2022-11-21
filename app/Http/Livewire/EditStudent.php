<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Student;
use LivewireUI\Modal\ModalComponent;

class EditStudent extends ModalComponent
{
    public $student;
    public $fullName;
    public $email;
    public $class;

    protected $rules = ([
        'fullName' => ['required','string'],
        'email' => ['required','email','unique:users,email,' . auth()->user()->id],
        'class' => ['required', 'string']
    ]);

    public function mount(User $student)
    {
        $this->student = $student;
        $this->fullName = $student->name;
        $this->email = $student->email;

        $class = Student::where('user_id', $student->id)->value('class');

        $this->class = strtolower($class);  
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        User::where('id', $this->student->id)->update([
            'name' => $this->fullName,
            'email' => $this->email,
        ]);

        Student::where('user_id', $this->student->id)->update([
            'class' => $this->class,
        ]);

        session()->flash('message', 'Student, ' . $this->fullname .' has been updated successfully.');

        return redirect()->route('students.index');
    }

    public function render()
    {
        return view('livewire.edit-student', [
            'name' => $this->student->name
        ]);
    }
}
