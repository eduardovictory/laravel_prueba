<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_Producto extends Model
{
    use HasFactory;

    protected $table = 'pedido_producto';

    protected $fillable = [
        'id',
        'pedido_id',
        'producto_id',
        'cantidad'
    ];
}
