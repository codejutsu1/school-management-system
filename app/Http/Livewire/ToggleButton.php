<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Teacher;
use Livewire\Component;
use App\Models\SubjectClass;
use Illuminate\Database\Eloquent\Model;

class ToggleButton extends Component
{
    public bool $isActive;
    public int $user;
    public string $field;
    public $individual;
    public $classes;

    public function mount()
    {
        $this->individual = User::where('id', $this->user)->first();

        $this->isActive = (bool) $this->individual->hasPermissionTo($this->field);

        $this->classes = SubjectClass::pluck('name')->toArray();
    }

    public function render()
    {
        return view('livewire.toggle-button');
    }

    public function updating($field, $value)
    {
        if($value)
        {
            $this->individual->givePermissionTo($this->field);

            if(in_array($this->field, $this->classes)){
                Teacher::where('user_id', $this->user)->update([
                    'formClass' => $this->field,
                ]);
            }

        } 
        else 
        {
            $this->individual->revokePermissionTo($this->field);

            if(in_array($this->field, $this->classes)){
                Teacher::where('user_id', $this->user)->update([
                    'formClass' => NULL,
                ]);
            }
        }
    }
}
