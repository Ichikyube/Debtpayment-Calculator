<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DebtCalc extends Component
{
    public $index;
    public $debtCard = [];
    public $allDebts = [];

    public function mount()
    {
        //$this->allDebts = Debt::all();
        $this->debtCard = [
            ['debt_id' => '']
        ];
    }

    public function addDebt()
    {
        $this->debtCard[] = ['debt_id' => ''];
    }

    public function removeDebt($index)
    {
        unset($this->debtCard[$index]);
        $this->debtCard = array_values($this->debtCard);
    }

    public function render()
    {
        info($this->debtCard);
        return view('livewire.debt-calc');
    }
}
