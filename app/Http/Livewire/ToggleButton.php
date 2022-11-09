<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToggleButton extends Component
{
    public bool $isActive;
    public Model $model;
    public string $field;

    public function mount()
    {
        $this->isActive = (bool) $this->model->getAttribute($this->field);
    }

    public function render()
    {
        return view('livewire.toggle-button');
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
    }
}
