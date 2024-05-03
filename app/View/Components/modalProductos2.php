<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modalProductos2 extends Component
{
    public $datos;
    public $model;

    /**
     * Create a new component instance.
     *
     * @param  array  $datos
     * @return void
     */
    public function __construct($datos = [], $model)
    {
        $this->datos = $datos;
        $this->model = $model;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-productos2');
    }
}
