<?php

namespace App\Http\Livewire\Create;

use App\Models\Department;
use LivewireUI\Modal\ModalComponent;

class EditDepartment extends ModalComponent
{
    public $name;
    public $department;

    protected $rules = [
        'name' => 'required|string|unique:departments',
    ];

    public function mount(Department $department)
    {
        $this->name = $department->name;
        $this->department = $department;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        Department::where('id', $this->department->id)->update($this->validate());

        session()->flash('message', 'Update Successful.');

        return redirect()->route('create.departments');
    }

    public function render()
    {
        return view('livewire.create.edit-department');
    }
}
