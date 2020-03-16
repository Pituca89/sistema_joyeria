<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaDeVenta extends Model
{
    //
    protected $table = 'lineofsale';

    protected $fillable = [
        'idusuario',
        'idarticulo',
        'idventa',
        'cantidad',
        'subtotal_pesos',
        'subtotal_dolares',
        'subtotal_gramos_oro'
    ];
}
