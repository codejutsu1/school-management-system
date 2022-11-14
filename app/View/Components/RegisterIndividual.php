<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RegisterIndividual extends Component
{
    public $individual;
    public $value;
    public $departments;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($individual, $value, $departments)
    {
        $this->individual = $individual;
        $this->value = $value;
        $this->departments = $departments;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.register-individual');
    }
}
