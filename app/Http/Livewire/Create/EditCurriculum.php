<?php

namespace App\Http\Livewire\Create;

use App\Models\Curriculum;
use LivewireUI\Modal\ModalComponent;

class EditCurriculum extends ModalComponent
{
    public $name;
    public $curriculum;

    protected $rules = [
        'name' => 'required|string|unique:curriculum',
    ];

    public function mount(Curriculum $curriculum)
    {
        $this->name = $curriculum->name;
        $this->curriculum = $curriculum;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        Curriculum::where('id', $this->curriculum->id)->update($this->validate());

        session()->flash('message', 'Update Successful.');

        return redirect()->route('extra.curriculum');
    }

    public function render()
    {
        return view('livewire.create.edit-curriculum');
    }
}
