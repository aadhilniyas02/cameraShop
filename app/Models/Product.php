<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_detail',
        'product_price',
        'product_image',
        'product_quantity',
    ];

    // One to One = One Product belongsTo One Cart
    public function carts() 
    {
        return $this->belongsTo(Cart::class);
    }

    // One Product belongsTo One User - Reverse from User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
