<?php

namespace App\Models;

use App\Models\Category;
use App\Models\SubSubcategory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'category_id', 'name_en', 'name_ar', 'status', 'slug'
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

    //has many reverse
    public function mainCats()
    {

        return $this->belongsTo(Category::class, 'category_id');
    }

    //has many sub-subcategory
    public function subSubCats()
    {
        return $this->hasMany(SubSubcategory::class, 'subcategory_id');
    }
    public function productSubCat()
    {
        return $this->HasMany(Product::class, 'subCategory_id');
    }


    public function scopeSearch($query, $val)
    {
        return $query
            ->where('name_en', 'like', '%' . $val . '%')
            ->OrWhere('name_ar', 'like', '%' . $val . '%');
    }
}
