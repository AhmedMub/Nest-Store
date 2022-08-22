<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaShipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'country', 'district',
    ];


    public function scopeSearch($query, $val)
    {
        return $query
            ->where('country', 'like', '%' . $val . '%')
            ->OrWhere('district', 'like', '%' . $val . '%');
    }
}
