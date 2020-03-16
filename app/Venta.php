<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    protected $table = 'sale';
    protected $fillable = ['idusuario','total_pesos','total_dolares','total_gramos_oro','finalizada','fecha_venta'];
}
