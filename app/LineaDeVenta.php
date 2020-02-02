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
        'subtotal_pesos',
        'subtotal_dolares',
        'subtotal_gramos_oro'
    ];
}
