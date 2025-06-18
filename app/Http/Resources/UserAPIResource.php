<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAPIResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "address" => $this->address,
            "img" => asset("userImages/".$this->img),
            "status" => $this->status == true ? "active" : "inactive",
            "gender" => $this->gender,
            "phone" => $this->phone,
            "roles" => $this->roles[0]->name
        ];
    }
}
