<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock > 0 ? $this->stock : 'out of stock',
            'discount' => $this->discount > 0 ? $this->discount : 'no discount yet',
            'total_price' =>  round((1-$this->discount/100) * $this->price, 2),
            'ratting' =>  $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(), 2) :'no ratting yet',
            'href' => [
                'reviews' => route('products.show', $this->id)
            ]
        ];
    }
}
