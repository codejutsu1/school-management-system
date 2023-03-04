<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Geography;
use LivewireUI\Modal\ModalComponent;

class EditScores extends ModalComponent
{
    public $user;
    public $first_ca;
    public $second_ca;
    public $exam;
    public $classes;
    public $session;
    public $subject;
    public $student;
    public $total;

    protected $rules = [
        'first_ca' => 'numeric|min:0|max:15',
        'second_ca' => 'numeric|min:0|max:15',
        'exam' => 'numeric|min:0|max:70'
    ];

    public function mount(User $user)
    {
        $this->user = $user;

        $this->className = "\\App\\Models\\".$this->subject; 

        $this->student = $this->className::where('user_id', $this->user->id)
                                                    ->where('class', $this->classes)
                                                    ->where('session', $this->session)
                                                    ->first();

        $this->first_ca = number_format($this->student->first_ca);

        $this->second_ca = number_format($this->student->second_ca);

        $this->exam = number_format($this->student->exam);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $total = $this->first_ca + $this->second_ca + $this->exam;
        
        $this->className::where('user_id', $this->user->id)->update([
            'first_ca' => $this->first_ca,
            'second_ca' => $this->second_ca,
            'exam' => $this->exam,
            'total' => $total,
        ]);

        session()->flash('message', 'Student scores has been updated successfully.');

        return redirect()->route('show.students');
    }
    
    public function render() 
    {
        return view('livewire.edit-scores');
    }
}
