<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class SidePanel extends Component
{
    public bool $open = false;
    public string $title = 'Default Panel';
    public string $component = '';

    protected $listeners = [
        'openPanel'
    ];

    public function openPanel(string $title, string $component): void
    {
        $this->open = true;
        $this->title = $title;
        $this->component = $component;
    }

    public function render()
    {
        return view('livewire.side-panel');
    }
}
