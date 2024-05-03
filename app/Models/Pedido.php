<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_usuario'
    ];

    public function producto()
    {
        return $this->hasMany(Pedido_Producto::class, 'pedido_id', 'id');
    }
}
