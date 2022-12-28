<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithPagination;

    public $name;
    public $roles;

    public function mount()
    {
        $this->roles = Role::all();
    }

    protected $rules = [
        'name' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $role = Role::create([
            'name' => $this->name,
        ]);

        $this->name = '';

        $this->roles->push($role);
    }

    
    public function render()
    {
        $allRoles = collect($this->roles)->paginate(10);

        return view('livewire.roles', ['allRoles' => $allRoles]);
    }
}
