<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    //
    protected $table = 'licence';
    protected $fillable = ['serie','cantidad'];
}
