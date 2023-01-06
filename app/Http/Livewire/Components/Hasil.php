<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Hasil extends Component
{
    public $showDiv = false;

    public function openDiv()
    {
        $this->showDiv =! $this->showDiv;
    }
    
    public function render()
    {
        return view('livewire.components.hasil');
    }
}
