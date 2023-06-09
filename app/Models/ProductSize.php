<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    protected $table = 'product_price';

    protected $fillable = ['product_id', 'size_id', 'price'];

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
