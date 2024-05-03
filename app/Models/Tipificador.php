<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipificador extends Model
{
    use HasFactory;

    protected $table = 'tipificadores';

    protected $fillable = [
        'nombre',
        'campo'
    ];
}
