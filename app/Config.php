<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //
    protected $table = "config";
    protected $fillable = ['gramo_oro_nacional','dolar','gramo_plata','gramo_oro_importado','hechura'];
}
