<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DropdownSelect extends Component
{
    public $cards = array(
        array(
          'id' => 1,
          'title' => 'Cicilan'
        ),
        array(
          'id' => 2,
          'title' => 'Hutang Bank'
        ),
        array(
          'id' => 3,
          'title' => 'Hutang lainnya'
        )
      );
    public function render()
    {
        return view('livewire.dropdown-select');
    }
}
