<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictShip extends Model
{
    use HasFactory;

    protected $fillable = [
        'district'
    ];


    public function scopeSearch($query, $val)
    {
        return $query
            ->where('district', 'like', '%' . $val . '%');
    }

    public function countryShipping()
    {
        return $this->belongsToMany(CountryShip::class, 'country_districts', 'district_id', 'country_id');
    }
}
