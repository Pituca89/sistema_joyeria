<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $table = 'provider';
    protected $fillable = ['cuit','nombre'];
}
