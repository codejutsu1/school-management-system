<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Jss1;
use App\Models\Student;
use App\Models\Teacher;
use Livewire\Component;
use App\Models\SubjectTeacher;

class ShowStudents extends Component
{
    public $classes;
    public $session;
    public $students = [];
    public $className;
    public $total;
    public $teacher_classes;
    public $average;

    public function mount()
    {
        $this->subject = Teacher::where('user_id', auth()->user()->id)->value('department');

        $this->className = "\\App\\Models\\".$this->subject; 

        $this->teacher_classes = SubjectTeacher::where('user_id', auth()->user()->id)->value('classes') ?? [];

        sort($this->teacher_classes);
    }

    public function render()
    {
        if($this->classes && $this->session) 
        {
            $this->students = $this->className::where('class', $this->classes)
                                    ->where('session', $this->session)
                                    ->with('user', function($query){
                                        $query->select(['id','name', 'slug']);
                                    })
                                    ->get();  
                                    
            $this->average  = $this->className::where('class', $this->classes)
                                    ->where('session', $this->session)
                                    ->avg('total');

            $this->average = round($this->average, 2);
        }
        return view('livewire.teacher.show-students');
    }
}
