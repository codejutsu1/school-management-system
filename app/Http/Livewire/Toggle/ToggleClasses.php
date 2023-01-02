<?php

namespace App\Http\Livewire\Toggle;

use Livewire\Component;
use App\Models\SubjectTeacher;

class ToggleClasses extends Component
{
    public int $user_id;
    public bool $isActive = false;
    public string $field;
    public $classes = [];
    public $teacher;

    public function mount()
    {
        $this->teacher = SubjectTeacher::where('user_id', $this->user_id)->first();

        if($this->teacher) $this->classes = $this->teacher->classes;

        if($this->classes) $this->isActive = (bool) in_array($this->field, $this->classes);
    }

    public function render()
    {
        return view('livewire.toggle.toggle-classes');
    }

    public function updating($field, $value)
    {
        if($value) {
            array_push($this->classes, $this->field);

            SubjectTeacher::updateOrCreate(
                ['user_id' => $this->user_id],
                ['classes' => $this->classes]
            );
        }else {
            $this->classes = array_diff($this->classes, array($this->field));
            
            SubjectTeacher::updateOrCreate(
                ['user_id' => $this->user_id],
                ['classes' => $this->classes]
            );
        }
    }
}
