<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        'name',
        'size',
        'stock',
        'price',
        'shipping_date'
    ];


    public function trademark(){
        return $this->belongsTo('App\Trademark');
    }

    public function sales(){
        return $this->belongsToMany('App\Sale');
    }
}
