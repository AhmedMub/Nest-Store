<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'name', 'description', 'discount_percent'
    ];

    public function productDiscount()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    //for laravel scout to search in this field only
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
        ];
    }
}
