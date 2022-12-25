<?php

namespace App\Http\Livewire;

use App\Models\Lga;
use App\Models\State;
use App\Models\Teacher;
use Livewire\Component;

class TeacherFill extends Component
{
    public $state = '';
    public $lgas = [];
    public $lga = '';
    public $dob;
    public $religion = '';

    protected $rules = [
        'state' => 'required',
        'lga' => 'required',
        'dob' => 'required',
        'religion' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        Teacher::where('user_id', auth()->user()->id)->update([
            'state' => $this->state,
            'lga' => $this->lga,
            'dob' => $this->dob,
            'religion' => $this->religion,
            'complete' => 1
        ]);

        session()->flash('message', 'You have successfully filled in your information.');

        return redirect()->route('dashboard');
    }


    public function render()
    {
        if(!empty($this->state)) {
            $this->lgas = Lga::where('name', $this->state)->get();
        }

        return view('livewire.teacher-fill')
                    ->withStates(State::orderBy('name')->get());
    }
}
