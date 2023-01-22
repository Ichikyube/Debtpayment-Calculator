<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DebtCalc extends Component
{
    // public $index;

    // public function mount($index)
    // {
    //     $this->index = $index;
    // }

    // public function delete($index)
    // {
    //     $this->emitUp('removeDebt', $index);
    // }

    public function render()
    {
        return view('livewire.debt-calc');
    }
}
