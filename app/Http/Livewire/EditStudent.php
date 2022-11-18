<?php

namespace App\Http\Livewire;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class EditStudent extends ModalComponent
{
    public User $user;

    public function mount(User $user)
    {
        Gate::authorize('update', $user);
        
        $this->user = $user;
        dd($this->user);
    }

    public function render()
    {
        return view('livewire.edit-student');
    }
}
