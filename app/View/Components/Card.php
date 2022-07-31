<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $label, $button;
    public function __construct($label = null, $button = null)
    {
        $this->label = $label;
        $this->button = $button;
    }

    public function render()
    {
        return view('components.card');
    }
}
