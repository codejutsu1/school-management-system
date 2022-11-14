<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;

class CreateDepartments extends Component
{
    use WithPagination;
    
    public $name;
    public $departments;

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
        $allDepartments =  collect($this->departments)->paginate(10);

        return view('livewire.create-departments', ['allDepartments' => $allDepartments]);
    }
}
