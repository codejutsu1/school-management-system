<?php

namespace App\Http\Livewire\Class;

use App\Models\User;
use App\Models\Student;
use Livewire\Component;

class ClassTable extends Component
{
    public $classes = [];
    public $name;
    public $students;

    public function mount()
    {
        $this->classes = ['jss1a', 'jss1b', 'jss1c', 'jss1d'];

        $this->name = Auth()->user()->getDirectPermissions()->value('name');

        if(Auth()->user()->hasAnyPermission($this->classes)){
            $this->students = User::join('students', 'users.id', '=', 'students.user_id')
                                        ->select(['users.id','users.name', 'users.email', 'students.house', 'students.extraCurriculumActivities','students.class'])
                                        ->where('students.class', '=', $this->name)
                                        ->orderBy('name')
                                        ->get();
        }
    }

    public function render()
    {
        return view('livewire.class.class-table', ['students' => $this->students]);
    }
}
