<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'detail', 'price', 'stock', 'discount'];

    public function reviews()
    {
        return $this->hasMany(Review::class); // one product has many reviews
    }
}
