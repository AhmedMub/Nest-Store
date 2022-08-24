<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCountry extends Model
{
    use HasFactory;

    protected $fillable = [
        'country', 'status'
    ];

    public function countryDistricts()
    {
        return $this->hasMany(ShippingDistrict::class, 'country_id');
    }

    public function scopeSearch($query, $val)
    {
        return $query
            ->where('country', 'like', '%' . $val . '%');
    }
}
