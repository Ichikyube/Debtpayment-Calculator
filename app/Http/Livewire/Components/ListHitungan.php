<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class ListHitungan extends Component
{
    public $dataId ;
    public function setId($id)
    {
        $this->dataId = $id;
    }
    public function render()
    {
        return view('livewire.components.list-hitungan');
    }
}
