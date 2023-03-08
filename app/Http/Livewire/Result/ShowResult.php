<?php

namespace App\Http\Livewire\Result;

use App\Models\Jss1;
use App\Machine\Result;
use Livewire\Component;

class ShowResult extends Component
{
    public $user;
    public $results;
    public $class_position;
    public $overall_position;
    public $class_no;
    public $class_average;

    public function mount()
    {
        $result = new Result();

        $this->results = $result->displayResult($this->user->id);

        $this->class_position = Jss1::where('user_id', $this->user->id)->value('position');
        
        $this->overall_position = Jss1::where('user_id', $this->user->id)->value('class_position');

        $this->class_no = Jss1::where('session', '2020/2021')->count();

        $this->class_average = Jss1::where('session', '2020/2021')->avg('total');
    }

    public function render()
    {
        return view('livewire.result.show-result');
    }
}
