<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name_en', 'name_ar', 'logo', 'status', 'address', 'phone', 'description_en', 'description_ar', 'facebook', 'instagram', 'twitter', 'start_date', 'slug'
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
            ->OrWhere('description_en', 'like', '%' . $val . '%')
            ->OrWhere('description_ar', 'like', '%' . $val . '%');
    }
}
