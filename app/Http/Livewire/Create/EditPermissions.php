<?php

namespace App\Http\Livewire\Create;

use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class EditPermissions extends ModalComponent
{
    public $name;
    public $permission;

    protected $rules = [
        'name' => 'required|string|unique:permissions',
    ];

    public function mount(Permission $permission)
    {
        $this->name = $permission->name;
        $this->permission = $permission;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        Permission::where('id', $this->permission->id)->update($this->validate());

        session()->flash('message', 'Update Successful.');

        return redirect()->route('permissions');
    }

    public function render()
    {
        return view('livewire.create.edit-permissions');
    }
}
