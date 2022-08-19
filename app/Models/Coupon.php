<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Coupon extends Model
{
    use HasFactory;
    //use Searchable;

    protected $fillable = [
        'name', 'discount', 'valid_from', 'valid_to'
    ];

    //add search functionality using laravel scouts
    // public function toSearchableArray()
    // {
    //     return [
    //         'name' => $this->name,
    //         'discount' => $this->discount
    //     ];
    // }

    public function validityDays($from, $to)
    {
        $fromDate = Carbon::parse($from);
        $toDate = Carbon::parse($to);
        $days = $fromDate->diffInDays($toDate);

        return $days;
    }

    public function scopeSearch($query, $val)
    {
        return $query
            ->where('name', 'like', '%' . $val . '%')
            ->OrWhere('discount', 'like', '%' . $val . '%');
    }
}
