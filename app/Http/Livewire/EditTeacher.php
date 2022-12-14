<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Teacher;
use Livewire\Component;
use App\Models\Department;
use LivewireUI\Modal\ModalComponent;

class EditTeacher extends ModalComponent
{
    public $teacher;
    public $fullName;
    public $email;
    public $department;

    protected function rules()
    {
        return [
            'fullName' => 'required|string',
            'email' => ['required', 'string', 'unique:users,email,' . $this->teacher->id],
            'department' => 'required|string'
        ];
    }

    public function mount(User $teacher)
    {
        $this->teacher = $teacher;
        $this->fullName = $teacher->name;
        $this->email = $teacher->email;

        $this->department = Teacher::where('user_id', $this->teacher->id)->value('department');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        User::where('id', $this->teacher->id)->update([
            'name' => $this->fullName,
            'email' => $this->email,
        ]);

        Teacher::where('user_id', $this->teacher->id)->update([
            'department' => $this->department,
        ]);

        session()->flash('message', 'Teacher, ' . $this->fullName .' has been updated successfully.');

        return redirect()->route('teachers.index');
    }

    public function render()
    {
        return view('livewire.edit-teacher',  [
            'name' => $this->teacher->name,
            'departments' => Department::pluck('name'),
        ]);
    }
}
