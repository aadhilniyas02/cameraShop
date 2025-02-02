<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'user_id'=> $this->user_id,
            'product_id' => $this->product_id,
            'product_quantity' => $this->quantity,
            'user' => new UserResource($this->whenLoaded('user')), // Include user details
            'product' => new ProductResource($this->whenLoaded('product')), // Include product details
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
