<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modalProductos extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;
    public $nombre;
    public $observacion;
    public $precio;
    public $tipo_producto;

    public function __construct($id = '', $nombre = '', $observacion = '', $precio = 0, $tipo_producto = 0)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->observacion = $observacion;
        $this->precio = $precio;
        $this->tipo_producto = $tipo_producto;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-productos');
    }
}
