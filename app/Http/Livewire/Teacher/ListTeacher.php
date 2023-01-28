<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Teacher;
use Livewire\Component;

class ListTeacher extends Component
{
    public $department;
    public $teachers;

    public function mount()
    {
        $this->department = Teacher::where('user_id', Auth()->user()->id)->value('department');
        $this->teachers = Teacher::with('user')
                                    ->select('user_id', 'department')
                                    ->where('department', $this->department)->get();
    }

    public function render()
    {
        return view('livewire.teacher.list-teacher');
    }
}
