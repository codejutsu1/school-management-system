<?php

namespace App\Http\Livewire\Result;

use Livewire\Component;
use App\Models\SubjectClass;

class Individually extends Component
{
    public $classes;
    public $student_class;
    public $session;
    public $users = [];

    public function mount()
    {
        $this->classes = SubjectClass::pluck('name');
    }
    
    public function render()
    {
        if($this->student_class && $this->session)
        {
            $class = substr($this->student_class, 0, -1);

            $class = strtoupper($class);

            $student_id = strtolower($class) . 's.user_id';

            $student_class = strtolower($class) . 's.classes';

            $student_session = strtolower($class) . 's.session';
            

            $student_model = "\\App\\Models\\".$class;

            $this->users = $student_model::join('users', $student_id, '=' ,'users.id')
                                        ->join('students', $student_id, '=' , 'students.user_id')
                                        ->select(['users.id',  'users.name', 'users.slug', 'students.gender', 'students.extraCurriculumActivities', 'students.house', 'users.created_at'])
                                        ->where([$student_class => $this->student_class, $student_session => $this->session])
                                        ->get();
        }

        return view('livewire.result.individually');
    }
}
