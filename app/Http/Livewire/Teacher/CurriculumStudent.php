<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Student;
use App\Models\Teacher;
use Livewire\Component;

class CurriculumStudent extends Component
{
    public $curriculum;
    public $students;

    public function mount()
    {
        $this->curriculum = Teacher::where('user_id', auth()->user()->id)->value('extraCurriculumActivities');

        $this->students = Student::with('user')
                                ->where('extraCurriculumActivities', $this->curriculum)
                                ->select('user_id','class','extraActivitiesPrefect')
                                ->orderBy('class')
                                ->get();
    }


    public function render()
    {
        return view('livewire.teacher.curriculum-student');
    }
}
