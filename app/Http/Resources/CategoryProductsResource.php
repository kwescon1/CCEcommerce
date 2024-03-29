<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryProductsResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'stock' => $this->quantity,
            'status' => $this->status,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => $this->image,
            'price' => rand(2, 100),
            'date' => $this->created_at,
        ];
    }
}
