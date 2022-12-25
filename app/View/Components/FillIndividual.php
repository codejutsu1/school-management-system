<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FillIndividual extends Component
{
    public $states;
    public $lgas;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($states, $lgas)
    {
        $this->states = $states;
        $this->lgas = $lgas;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.fill-individual');
    }
}
