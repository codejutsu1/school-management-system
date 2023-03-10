<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Teacher;
use Livewire\Component;
use App\Models\Department;

class TeachersTable extends Component
{
    public $departments;
    public $department;
    public $users = [];

    public function mount()
    {
        $this->departments = Department::pluck('name');
    }

    public function render()
    {
        if($this->department)
        {
            $this->users = Teacher::join('users', 'teachers.user_id', '=', 'users.id')
                                    ->select(['users.id', 'users.name', 'users.slug', 'users.email', 'users.created_at' ,'teachers.gender', 'teachers.extraCurriculumActivities', 'teachers.house'])
                                    ->where('teachers.department', $this->department)
                                    ->get();
        }

        return view('livewire.teachers-table', [
            'users' => User::role('teacher')->get()
        ]);
    }

    public function deleteTeacher($id)
    {
        $teacher = User::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')
                    ->with('message', 'Teacher, ' . $teacher->name .' has been deleted successfully.');
    }
}
