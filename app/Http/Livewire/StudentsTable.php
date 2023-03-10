<?php

namespace App\Http\Livewire;

use App\Models\User;

use Livewire\Component;
use App\Models\SubjectClass;
use Livewire\WithPagination;

class StudentsTable extends Component
{
    use WithPagination;

    public $student_class;
    public $stu_class;
    public $classes;
    public $session;
    public $users = [];

    public function mount()
    {
        $this->classes = SubjectClass::pluck('name');
    }

    public function render()
    {
        if($this->stu_class && $this->session)
        {
            $this->student_class = substr($this->stu_class, 0, -1);
            $this->student_class = strtoupper($this->student_class);

            $student_id = strtolower($this->student_class) . 's.user_id';

            $student_class = strtolower($this->student_class) . 's.classes';

            $student_session = strtolower($this->student_class) . 's.session';
            

            $student_model = "\\App\\Models\\".$this->student_class;

            $this->users = $student_model::join('users', $student_id, '=' ,'users.id')
                                    ->join('students', $student_id, '=' , 'students.user_id')
                                    ->select(['users.id',  'users.name', 'users.slug', 'students.gender', 'students.extraCurriculumActivities', 'students.house', 'users.created_at'])
                                    ->where([$student_class => $this->stu_class, $student_session => $this->session])
                                    ->get();
        }
        
        return view('livewire.students-table');
    }

    public function deleteConfirm($id)
    {
        $student = User::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')
                    ->with('message', 'Student, ' . $student->name .' has been deleted successfully.');
    }
}
