<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'tags_en', 'tags_ar'
    ];

    public function productTags()
    {
        return $this->hasMany(Product::class, 'product_id');
    }
}
