<?php

namespace App\Models;

use BinaryCats\Sku\HasSku;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, Sluggable, HasSku, InteractsWithMedia;

    protected $fillable = [
        'createdBy_adminID', 'updatedBy_adminID', 'product_status', 'subCategory_id', 'category_id', 'subSubCategory_id', 'vendor_id', 'slug', 'name_en', 'name_ar', 'sku', 'qty', 'price', 'size', 'hot_deals', 'new_deals', 'type', 'mfg', 'life', 'desc_status', 'discount_status', 'additionalInfo_status', 'vendor_status', 'reviews_status',
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


    /**
     * Register the media collections
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('mainImage')
            ->singleFile();
    }

    //Model RelationShips
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'createdBy_adminID');
    }
    public function productVendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function productMainCat()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function productSubCat()
    {
        return $this->belongsTo(SubCategory::class, 'subCategory_id');
    }
    public function productSubSubCat()
    {
        return $this->belongsTo(SubSubcategory::class, 'subSubCategory_id');
    }

    //has many through to access sub-subcategory
    // public function subSubcategoryThroCategory()
    // {
    //     return $this->hasManyThrough(SubSubcategory::class, SubCategory::class, 'category_id', 'subcategory_id');
    // }
}
