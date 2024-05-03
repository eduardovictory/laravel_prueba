<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tipificadorLupa2 extends Component
{
    public $campo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($campo)
    {
        $this->campo = $campo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tipificador-lupa2');
    }
}
