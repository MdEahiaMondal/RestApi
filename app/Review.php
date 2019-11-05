<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   protected  $fillable = ['product_id', 'customer', 'star', 'review'];


   public function product()
   {
       return $this->belongsTo(Product::class); // one review has connected with any product
   }
}
