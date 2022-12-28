<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    use WithPagination;

    public $name;
    public $permissions;

    public function mount()
    {
        $this->permissions = Permission::all();
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

        $permission = Permission::create([
            'name' => $this->name,
        ]);

        $this->name = '';

        $this->permissions->push($permission);
    }

    public function render()
    {

        $allPermissions = collect($this->permissions)->paginate(10);

        // dd($permissions);

        return view('livewire.permissions', ['allPermissions' => $allPermissions]);
    }
}
