<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    //
    protected $table = 'machine';

    protected $fillable = ['mac','licencia','estado'];
}
