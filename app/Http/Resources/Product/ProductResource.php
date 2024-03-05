<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'details'=>$this->details,
            'price'=>$this->price,
            'stock'=> $this->stock != 0 ?  $this->stock : 'Out of Stock',
            'discount'=>$this->discount,
            'totalPrice'=>round((1 - ($this->discount/100))*($this->price)),
            'rating'=> count($this->review) > 0 ? round($this->review->sum('star')/count($this->review),2) : 'Not Rating Yet',
            'href'=>[
                'review'=>route('reviews.index',$this->id)
            ]
        ];
    }
}
