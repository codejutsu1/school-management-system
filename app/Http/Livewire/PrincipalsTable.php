<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class PrincipalsTable extends Component
{
    public function render()
    {
        return view('livewire.principals-table', [
            'users' => User::role('vice principal')->get()
        ]);
    }

    public function deletePrincipal($id)
    {
        $principal = User::findOrFail($id);
        $principal->delete();

        return redirect()->route('principals.index')
                    ->with('message', 'Vice Principal, ' . $principal->name .' has been deleted successfully.');
    }
}
