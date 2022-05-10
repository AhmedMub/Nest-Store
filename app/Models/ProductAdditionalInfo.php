<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAdditionalInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'stand_up_en', 'stand_up_ar', 'folded_en', 'folded_ar', 'frame_en', 'frame_ar', 'color_en', 'color_ar', 'size_en', 'size_ar'
    ];
}
