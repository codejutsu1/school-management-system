<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditPrincipal extends ModalComponent
{
    public $principal;
    public $fullName;
    public $email;

    protected function rules()
    {
        return [
            'fullName' => 'required|string',
            'email' => ['required', 'string', 'unique:users,email,' . $this->principal->id]
        ];
    }

    public function mount(User $principal)
    {
        $this->principal = $principal;
        $this->fullName = $principal->name;
        $this->email = $principal->email;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        User::where('id', $this->principal->id)->update([
            'name' => $this->fullName,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Vice Principal, ' . $this->fullName .' has been updated successfully.');

        return redirect()->route('principals.index');
    }

    public function render()
    {
        return view('livewire.edit-principal', [
            'name' => $this->principal->name,
        ]);
    }
}
