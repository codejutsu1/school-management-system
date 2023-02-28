<?php

namespace App\Http\Livewire\Class;

use App\Models\Jss1;
use App\Models\User;
use App\Models\Student;
use Livewire\Component;
use App\Models\Department;
use App\Models\SubjectClass;

class ClassTable extends Component
{
    public $classes = [];
    public $name;
    public $students;
    public $added_students;
    public $remain;
    public $number;
    public $subjects =  [];
    public $form_class;
    public $subject_model;

    public function mount()
    {
        $this->classes = SubjectClass::pluck('name')->toArray();

        $this->name = Auth()->user()->getDirectPermissions()->pluck('name')->toArray();

        $this->form_class = array_intersect($this->classes, $this->name);

        $this->form_class = reset($this->form_class);

        if(Auth()->user()->hasAnyPermission($this->classes)){
            $this->students = User::join('students', 'users.id', '=', 'students.user_id')
                                        ->select(['users.id','users.name', 'users.email', 'students.house', 'students.extraCurriculumActivities','students.class', 'students.gender'])
                                        ->where('students.class', '=', $this->form_class)
                                        ->orderBy('name')
                                        ->get();
        }

        $this->added_students = Jss1::pluck('user_id')->toArray();

        if(count($this->students) != count($this->added_students))
        {
            $this->remain  = true;
            $this->number = count($this->students) - count($this->added_students);
        }

        $this->subjects = Department::pluck('name')->toArray();
    }

    public function addSingleStudent($id)
    {
        Jss1::firstOrCreate([
            'user_id' => $id,
            'classes' => $this->form_class,
            'session' => '2020/2021', //Please create a table(column) for the session
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
                'classes' => $this->form_class,
                'session' => '2020/2021'
            ]);
        }

        foreach($students as $student)
        {
            foreach($this->subjects as $subject)
            {
                $this->subject_model = "\\App\\Models\\".$subject;

                $this->subject_model::firstOrCreate([
                    'user_id' => $student['id'],
                    'class' => $this->form_class,
                    'session' => '2020/2021',
                    'teachers_name' => auth()->user()->name,
                ]);
            }
        }

        session()->flash('message', 'All students successfully added to your class');

        return redirect()->route('jss1a');
    }

    public function render()
    {
        return view('livewire.class.class-table', ['students' => $this->students]);
    }
}
