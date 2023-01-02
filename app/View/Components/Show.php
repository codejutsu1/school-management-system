<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Show extends Component
{
    public $permissions;
    public $users;
    public $roles;
    public $classes;
    public bool $teacher;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($users, $permissions, $roles, $classes = NULL, $teacher = NULL)
    {
        $this->permissions = $permissions;
        $this->users = $users;
        $this->roles = $roles;
        $this->classes = $classes;
        $this->teacher = $teacher;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.show');
    }
}
