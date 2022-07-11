<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Slider extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use Searchable;

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

    /**
     * Register the media collections
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('slider')
            ->useDisk('slider')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(200)
                    ->height(200);
            });;
    }
}
