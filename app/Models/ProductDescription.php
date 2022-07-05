<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'short_desc_en', 'short_desc_ar', 'long_desc_en', 'long_desc_ar', 'packaging_delivery_en', 'packaging_delivery_ar', 'suggested_use_en', 'suggested_use_ar', 'other_ingredients_en', 'other_ingredients_ar', 'warnings_en', 'warnings_ar'
    ];

    public function productDescriptions()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
