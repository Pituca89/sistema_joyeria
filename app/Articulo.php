<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
    protected $table = 'article';
    protected $fillable = [
        'codigo_barras',
        'nombre',
        'peso',
        'item_id',
        'brand_id',
        'material_id',
        'category_id',
        'provider_id'
    ];
    public function price(){
        return $this->hasOne('App\Precio');
    }
    public function stock(){
        return $this->hasOne('App\Stock');
    }
}
