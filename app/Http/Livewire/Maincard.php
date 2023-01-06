<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Maincard extends Component
{

    public $cards = array(
        array(
          'id' => 1,
          'title' => 'Card 1'
        ),
        array(
          'id' => 2,
          'title' => 'Card 2'
        ),
        array(
          'id' => 3,
          'title' => 'Card 3'
        )
      );
    public function render()
    {
        return view('livewire.main-card');
    }
}
