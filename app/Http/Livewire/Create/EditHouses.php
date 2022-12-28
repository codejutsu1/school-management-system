<?php

namespace App\Http\Livewire\Create;

use App\Models\House;
use LivewireUI\Modal\ModalComponent;

class EditHouses extends ModalComponent
{
    public $name;
    public $house;

    protected $rules = [
        'name' => 'required|string|unique:houses',
    ];

    public function mount(House $house)
    {
        $this->house = $house;
        $this->name = $house->name;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        House::where('id', $this->house->id)->update($this->validate());

        session()->flash('message', 'Update Successful.');

        return redirect()->route('create.house');
    }

    public function render()
    {
        return view('livewire.create.edit-houses');
    }
}
