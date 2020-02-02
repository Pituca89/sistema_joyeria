<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    //
    protected $table = 'price';
    protected $fillable = ['articulo_id','valor_compra','valor_venta','valor_dolar','valor_oro'];
}
