<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class TeachersTable extends Component
{
    public function render()
    {
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
