<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'product_status', 'category_id', 'subCategory_id', 'category_id', 'subSubCategory_id', 'vendor_id', 'slug', 'name_en', 'name_ar', 'sku', 'qty', 'price', 'price', 'size', 'hot_deals', 'new_deals', 'type', 'mfg', 'life', 'desc_status', 'discount_status', 'additionalInfo_status', 'vendor_status', 'reviews_status',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_en'
            ]
        ];
    }


    public function scopeSearch($query, $val)
    {
        return $query
            ->where('name_en', 'like', '%' . $val . '%')
            ->OrWhere('name_ar', 'like', '%' . $val . '%');
    }

    // public function subCats()
    // {
    //     return $this->HasMany(SubCategory::class);
    // }

    // //has many through to access sub-subcategory
    // public function subSubcategoryThroCategory()
    // {
    //     return $this->hasManyThrough(SubSubcategory::class, SubCategory::class, 'category_id', 'subcategory_id');
    // }
}
