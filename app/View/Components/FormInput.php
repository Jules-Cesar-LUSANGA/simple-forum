<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormInput extends Component
{
    public string $oldValue;
    /**
     * Create a new component instance.
     */
    public function __construct(string $oldValue = '')
    {
        $this->oldValue = $oldValue;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-input');
    }
}
