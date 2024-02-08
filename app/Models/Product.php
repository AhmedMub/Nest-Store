<?php

namespace App\Models;

use BinaryCats\Sku\HasSku;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;
use Laravel\Scout\Searchable;

class Product extends Model implements HasMedia
{
    use HasFactory, Sluggable, HasSku, InteractsWithMedia, HasTags, Searchable;

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
            ->OrWhere('name_ar', 'like', '%' . $val . '%')
            ->OrWhere('sku', 'like', '%' . $val . '%')
            ->OrWhereHas('productMainCat', function ($query) use ($val) {
                $query->where('name_en', 'like', '%' . $val . '%')
                    ->OrWhere('name_ar', 'like', '%' . $val . '%');
            })
            ->OrWhereHas('productSubCat', function ($query) use ($val) {
                $query->where('name_en', 'like', '%' . $val . '%')
                    ->OrWhere('name_ar', 'like', '%' . $val . '%');
            })
            ->OrWhereHas('productSubSubCat', function ($query) use ($val) {
                $query->where('name_en', 'like', '%' . $val . '%')
                    ->OrWhere('name_ar', 'like', '%' . $val . '%');
            });
    }


    /**
     * Register the media collections
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('mainImage')
            ->useDisk('products')
            ->singleFile();

        $this
            ->addMediaCollection('multiImages')
            ->useDisk('products')
            ->onlyKeepLatest(6);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->nonQueued();
    }

    //Model RelationShips
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'createdBy_adminID');
    }
    public function updatedByAdmin()
    {
        return $this->belongsTo(Admin::class, 'updatedBy_adminID');
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
    public function productDescriptions()
    {
        return $this->hasOne(ProductDescription::class, 'product_id');
    }
    public function productAdditionalInfo()
    {
        return $this->hasOne(ProductAdditionalInfo::class, 'product_id');
    }
    public function productDiscount()
    {
        return $this->hasOne(ProductDiscount::class, 'product_id');
    }
    public function productDates()
    {
        return $this->hasOne(ProductExpiration::class, 'product_id');
    }

    /*
        //*FrontEnd Relationships....
    */
    public function addToWishes()
    {
        return $this->belongsToMany(User::class, 'wish_lists', 'product_id', 'user_id');
    }

    /*
        -return float value if there is a number like 33.326
        -outputs would be like:
        /- 625.38
        /- 1,211.00
    */
    public function getPriceAttribute($val)
    {
        return number_format((float)round($val, 2, PHP_ROUND_HALF_DOWN), 2, '.', ',');
    }

    public function toSearchableArray()
    {
        return [
            'name_en' => $this->name_en,
            'name_ar' => $this->name_ar,
        ];
    }

    //has many through to access sub-subcategory
    // public function subSubcategoryThroCategory()
    // {
    //     return $this->hasManyThrough(SubSubcategory::class, SubCategory::class, 'category_id', 'subcategory_id');
    // }
}
