<?php

namespace App\Models;

use App\Models\SubCategory;
use App\Models\SubSubcategory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name_en', 'name_ar', 'icon', 'status', 'default_icon', 'default_icon_status', 'slug'
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

    public function subCats()
    {
        return $this->HasMany(SubCategory::class);
    }

    //has many through to access sub-subcategory
    public function subSubcategoryThroCategory()
    {
        return $this->hasManyThrough(SubSubcategory::class, SubCategory::class, 'category_id', 'subcategory_id');
    }
}
