<?php

namespace App\Http\Livewire;

use App\Models\House;
use Livewire\Component;
use Livewire\WithPagination;

class CreateHouse extends Component
{
    use WithPagination;
    
    public $name;
    public $houses;

    public function mount()
    {
        $this->houses = House::all();
    }

    protected $rules = [
        'name' => 'required|string|unique:houses',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $house = House::create([
            'name' => $this->name,
        ]);

        $this->name = '';

        $this->houses->push($house);
    }

    public function render()
    {
        $allHouses =  collect($this->houses)->paginate(10);

        return view('livewire.create-house', ['allHouses' => $allHouses]);
    }

    public function deleteConfirm(House $house)
    {
        $house->delete();

        return redirect()->route('create.house')
                        ->with('message', 'House, ' . $house->name .' has been deleted successfully.');
    }
}
