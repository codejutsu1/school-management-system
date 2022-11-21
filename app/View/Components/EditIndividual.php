<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class EditIndividual extends Component
{
    public $individual;
    public $value;
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($individual, $value=null, $name=null)
    {
        $this->individual = $individual;
        $this->value = $value;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.edit-individual');
    }
}
