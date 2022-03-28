<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubcategory extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'category_id', 'subcategory_id', 'name_en', 'name_ar', 'status', 'slug'
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
}
