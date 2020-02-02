<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $table = 'stock';
    protected $fillable = ['articulo_id','valor_minimo','valor_actual'];
}
