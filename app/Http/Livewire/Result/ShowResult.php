<?php

namespace App\Http\Livewire\Result;

use App\Machine\Result;
use Livewire\Component;

class ShowResult extends Component
{
    public $user;
    public $results;

    public function mount()
    {
        $result = new Result();

        $this->results = $result->displayResult($this->user->id);
    }

    public function render()
    {
        return view('livewire.result.show-result');
    }
}
