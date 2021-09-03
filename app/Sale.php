<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'sellerName'
    ];

    public function products(){
        return $this->belongsToMany('App\Product');
    }
}
