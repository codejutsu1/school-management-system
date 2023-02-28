<?php

namespace App\Http\Livewire\House;

use App\Models\Student;
use App\Models\Teacher;
use Livewire\Component;

class ListHouse extends Component
{
    public $house;
    public $students;

    
    public function mount()
    {
        $this->house = Teacher::where('user_id', auth()->user()->id)->value('house');

        $this->students = Student::with('user')
                                ->where('house', $this->house)
                                ->select('user_id','class','prefect', 'gender')
                                ->orderBy('class')
                                ->get();
    }

    public function render()
    {
        return view('livewire.house.list-house');
    }
}
