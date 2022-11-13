<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;

class CreateDepartments extends Component
{
    public $name;
    public $departmemts;

    public function mount()
    {
        $this->departments = Department::all();
    }

    protected $rules = [
        'name' => 'required|string|unique:departments',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $department = Department::create([
            'name' => $this->name,
        ]);

        $this->name = '';

        $this->departments->push($department);
    }

    public function render()
    {
        $departments =  collect($this->departments)->paginate(5);

        return view('livewire.create-departments', compact('departments'));
    }
}
