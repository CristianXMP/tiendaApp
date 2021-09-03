<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale_product extends Model
{
    protected $fillable = [

        'sale_id',
        'product_id'

    ];
    public $timestamps = false;
}
