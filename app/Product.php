<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        'name',
        'observation',
        'size',
        'stock',
        'price',
        'shipping_date',
        'trademark_id'
    ];

    public function trademark(){
        return $this->belongsTo(Trademark::class);
    }

    public function sales(){
        return $this->belongsToMany(Sale::class);
    }
}
