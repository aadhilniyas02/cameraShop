<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Product;

class ProductResource extends JsonResource
{

    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'product_name' => $this->product_name,
            'product_detail' => $this->product_detail,
            'product_price' => $this->product_price,
            'product_image' => $this->product_image,
            'product_quantity' => $this->product_quantity,
            'meta_data' => $this->meta_data,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at, 
        ];
    }
}
