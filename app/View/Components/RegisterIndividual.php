<?php

namespace App\View\Components;

use App\Models\Department;
use Illuminate\View\Component;

class RegisterIndividual extends Component
{
    public $individual;
    public $value;
    public $departments;
    public $classes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($individual, $value = null, $departments = null, $classes = null)
    {
        $this->individual = $individual;
        $this->value = $value;
        $this->departments = $departments;
        $this->classes = $classes;
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
