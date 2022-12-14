<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Create extends Component
{
    public $created;
    public $allCreated;
    public $editable;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($created, $allCreated, $editable)
    {
        $this->created = $created;
        $this->allCreated = $allCreated;
        $this->editable = $editable;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.create');
    }
}
