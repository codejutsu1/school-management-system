<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class ToggleButton extends Component
{
    public bool $isActive;
    public int $user;
    public string $field;
    public $individual;

    public function mount()
    {
        $this->individual = User::where('id', $this->user)->first();
        $this->isActive = (bool) $this->individual->hasPermissionTo($this->field);
    }

    public function render()
    {
        return view('livewire.toggle-button');
    }

    public function updating($field, $value)
    {
        if($value) $this->individual->givePermissionTo($this->field); else $this->individual->revokePermissionTo($this->field);
    }
}
