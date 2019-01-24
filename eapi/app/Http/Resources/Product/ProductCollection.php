<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'totalPrice' => round((1 - ($this->discount / 100)) * $this->price),
            'rating' => round($this->reviews->avg('star')),
            'discount' => $this->discount,
            'href' => [
                'link' => route('products.show', $this->id)            ]
        ];

    }
}
