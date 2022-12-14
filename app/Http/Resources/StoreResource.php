<?php

namespace App\Http\Resources;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
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
            'name'           => $this->name,
            'shipping_cost'  => $this->shipping_cost,
            'vat_percentage' => $this->vat_percentage,
            'products'       => ProductResource::collection($this->products)
        ];
    }
}
