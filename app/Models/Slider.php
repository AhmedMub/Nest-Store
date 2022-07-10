<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Slider extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title_en', 'title_ar', 'description_ar', 'description_en', 'status'
    ];

    //add search functionality using laravel scouts
    public function toSearchableArray()
    {
        return [
            'title_en' => $this->title_en,
        ];
    }
}
