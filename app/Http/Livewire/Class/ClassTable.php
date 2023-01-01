<?php

namespace App\Http\Livewire\Class;

use App\Models\Jss1;
use App\Models\User;
use App\Models\Student;
use Livewire\Component;

class ClassTable extends Component
{
    public $classes = [];
    public $name;
    public $students;
    public $added_students;
    public $remain;
    public $number;

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

        $this->added_students = Jss1::pluck('user_id')->toArray();

        if(count($this->students) != count($this->added_students))
        {
            $this->remain  = true;
            $this->number = count($this->students) - count($this->added_students);
        }
    }

    public function addSingleStudent($id)
    {
        Jss1::firstOrCreate([
            'user_id' => $id,
            'session' => '2020/2021', //Please create a table for the session
        ]);

        session()->flash('message', 'Student successfully added to your class');

        return redirect()->route('jss1a');
    }

    public function addAllStudents($students)
    {
        foreach($students as $student)
        {
            Jss1::firstOrCreate([
                'user_id' => $student['id'],
                'session' => '2020/2021'
            ]);
        }

        session()->flash('message', 'All students successfully added to your class');

        return redirect()->route('jss1a');
    }

    public function render()
    {
        return view('livewire.class.class-table', ['students' => $this->students]);
    }
}
