<?php

namespace App\Livewire;

use Livewire\Component;

class Count extends Component
{
    public $count = 0;

    public function increment()
    {
        if ($this->count < 10) {
            return $this->count++;
        }
    }

    public function decrement()
    {
        if ($this->count >0) {
            return $this->count--;
        }
    }

    public function render()
    {
        return view('livewire.count');
    }
}
