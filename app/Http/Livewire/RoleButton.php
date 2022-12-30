<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class RoleButton extends Component
{
    public bool $isActive;
    public int $user;
    public string $field;

    public function mount()
    {
        $user = User::where('id', $this->user)->first();
        $this->isActive = (bool) $user->hasRole($this->field);
    }

    public function render()
    {
        return view('livewire.role-button');
    }

    public function updating($field, $value)
    {
        $user = User::where('id', $this->user)->first();

        if($value) $user->assignRole($this->field); else $user->removeRole($this->field);
    }
}
