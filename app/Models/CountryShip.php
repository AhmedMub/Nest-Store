<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryShip extends Model
{
    use HasFactory;

    protected $fillable = [
        'country'
    ];


    public function scopeSearch($query, $val)
    {
        return $query
            ->where('country', 'like', '%' . $val . '%');
    }

    public function countryShipping()
    {
        return $this->belongsToMany(DistrictShip::class, 'country_districts', 'country_id', 'district_id');
    }
}
