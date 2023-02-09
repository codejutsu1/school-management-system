<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Jss1;
use App\Models\Student;
use App\Models\Teacher;
use Livewire\Component;

class ShowStudents extends Component
{
    public $classes;
    public $session;
    public $students;
    public $className;

    public function mount()
    {
        $this->subject = Teacher::where('user_id', auth()->user()->id)->value('department');
    }

    public function render()
    {
        if($this->classes && $this->session) 
        {
            $this->className = "\\App\\Models\\".$this->subject; 

            $this->students = $this->className::where('class', $this->classes)
                                    ->where('session', $this->session)
                                    ->with('user', function($query){
                                        $query->select(['id','name']);
                                    })
                                    ->get();                          
        }

        return view('livewire.teacher.show-students');
    }
}
