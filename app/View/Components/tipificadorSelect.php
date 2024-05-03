<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tipificadorSelect extends Component
{
    public $campo;
    public $id;
    public $tipo_num;

    /**
     * Create a new component instance.
     *
     * @param string $campo
     * @param string $tipo_num
     * @param int $id
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
        return view('components.tipificador-select');
    }
}
