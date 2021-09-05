<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
  protected  $fillable = [
    'name',
    'description',
    'reference'
  ];
  public function products(){
      return $this->hasMany(Product::class);
  }
}
