<?php

namespace App\View\Components;

use Illuminate\View\Component;

class popupLupa2 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $campo, $tipificador;

    public function __construct($campo, $tipificador)
    {
        $this->campo = $campo;
        $this->tipificador = $tipificador;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.popup-lupa2');
    }
}
