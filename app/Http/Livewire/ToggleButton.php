<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class ToggleButton extends Component
{
    public bool $isActive;
    public int $student;
    public string $field;

    public function mount()
    {
        $user = User::where('id', $this->student)->first();
        $this->isActive = (bool) $user->hasPermissionTo($this->field);
    }

    public function render()
    {
        return view('livewire.toggle-button');
    }

    public function updating($field, $value)
    {
        $user = User::where('id', $this->student)->first();

        if($value) $user->givePermissionTo($this->field); else $user->revokePermissionTo($this->field);
    }
}
