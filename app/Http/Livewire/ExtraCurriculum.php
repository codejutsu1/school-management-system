<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Curriculum;
use Livewire\WithPagination;

class ExtraCurriculum extends Component
{
    use WithPagination;
    
    public $name;
    public $curriculum;

    public function mount()
    {
        $this->curriculum = Curriculum::all();
    }

    protected $rules = [
        'name' => 'required|string|unique:departments',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $curriculum = Curriculum::create([
            'name' => $this->name,
        ]);

        $this->name = '';

        $this->curriculum->push($curriculum);
    }

    public function render()
    {
        $allCurriculum =  collect($this->curriculum)->paginate(10);

        return view('livewire.extra-curriculum', ['allCurriculum' => $allCurriculum]);
    }
}
