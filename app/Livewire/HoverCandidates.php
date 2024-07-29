<?php

namespace App\Livewire;

use Livewire\Component;

class HoverCandidates extends Component
{
    public $hover = true;

    public $imageSrc;
    public $imageChange;
    public $class;

    public function setHover(): void
    {
        $this->hover = !$this->hover;
    }

    public function render()
    {
        return view('livewire.hover-candidates');
    }
}
