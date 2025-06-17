<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductAPIResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "category_id" => $this->category_id,
            "name" => $this->name,
            "description" => $this->description,
            "image" => asset("productImages/" . $this->image),
            "price" => $this->price,
            "status" => $this->status === 1 ? "active" : "inactive"
        ];
    }
}
