<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporal extends Model
{
    //
    protected $table = 'temporal';
    protected $fillable = [
        'idarticulo',
        'idusuario',
        'nombre',
        'precio',
        'cantidad',
        'subtotal_pesos',
        'subtotal_dolares',
        'subtotal_gramos_oro'
    ];
}
