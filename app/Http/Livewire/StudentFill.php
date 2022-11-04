<?php

namespace App\Http\Livewire;

use App\Models\Lga;
use App\Models\State;
use App\Models\Student;
use Livewire\Component;

class StudentFill extends Component
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

        Student::where('user_id', auth()->user()->id)->update($this->validate());

        auth()->user()->givePermissionTo('fill profile');

        session()->flash('message', 'You have successfully filled in your information.');

        return redirect()->route('dashboard');
    }

    public function render()
    {
        if(!empty($this->state)) {
            $this->lgas = Lga::where('name', $this->state)->get();
        }

        return view('livewire.student-fill')
            ->withStates(State::orderBy('name')->get());
    }
}
