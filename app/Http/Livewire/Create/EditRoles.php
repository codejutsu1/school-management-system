<?php

namespace App\Http\Livewire\Create;

use Spatie\Permission\Models\Role;
use LivewireUI\Modal\ModalComponent;


class EditRoles extends ModalComponent
{
    public $name;
    public $role;

    protected $rules = [
        'name' => 'required|string|unique:roles',
    ];

    public function mount(Role $role)
    {
        $this->name = $role->name;
        $this->role = $role;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        Role::where('id', $this->role->id)->update($this->validate());

        session()->flash('message', 'Update Successful.');

        return redirect()->route('roles');
    }

    public function render()
    {
        return view('livewire.create.edit-roles');
    }
}
