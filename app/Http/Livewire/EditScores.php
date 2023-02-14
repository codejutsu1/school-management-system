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

    public function mount(User $user)
    {
        $this->user = $user;

        $this->className = "\\App\\Models\\".$this->subject; 

        $this->student = $this->className::where('user_id', $this->user->id)
                                                    ->where('class', $this->classes)
                                                    ->where('session', $this->session)
                                                    ->first();

        $this->first_ca = $this->student->first_ca;

        $this->second_ca = $this->student->second_ca;

        $this->exam = $this->student->exam;
    }

    public function submit()
    {
        $this->className::where('user_id', $this->user->id)->update([
            'first_ca' => $this->first_ca,
            'second_ca' => $this->second_ca,
            'exam' => $this->exam
        ]);

        session()->flash('message', 'Student scores has been updated successfully.');
    }
    
    public function render() 
    {
        return view('livewire.edit-scores');
    }
}
