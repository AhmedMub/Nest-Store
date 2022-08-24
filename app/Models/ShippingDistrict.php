<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDistrict extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id', 'district', 'status'
    ];

    public function countryDistricts()
    {
        return $this->belongsTo(ShippingCountry::class, 'country_id');
    }


    public function scopeSearch($query, $val)
    {
        return $query
            ->where('district', 'like', '%' . $val . '%')
            ->OrWhereHas('countryDistricts', function ($query) use ($val) {
                $query->where('country', 'like', '%' . $val . '%');
            });
    }
}
