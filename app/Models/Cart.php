<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'customer_id',
        'product_id',
        'total_price',
        'quantity',
    ];

    public function product(){
        return $this->hasMany(Product::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
