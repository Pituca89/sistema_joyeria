<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    //
    protected $table = 'image';
    protected $fillable = ['articulo_id','path'];
}
