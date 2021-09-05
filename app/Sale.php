<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'description'
    ];

    public function products(){
        return $this->belongsToMany(Product::class);
    }

}
