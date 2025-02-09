<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'product_id',
      'product_quantity',  
    ];


    // One to One = One Cart belongsTo One User - Reverse from User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // One Cart can have Many Products - Reverse from Product
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
