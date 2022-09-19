<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ProductExpiration extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'product_id', 'mfg', 'exp'
    ];

    public function productDates()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function remainingDays()
    {
        if (!Carbon::parse($this->exp)->isPast()) {
            return Carbon::parse($this->mfg)->diffInDays(Carbon::parse($this->exp), false);
        } else {
            return 0;
        }
    }


    public function scopeSearch($query, $val)
    {
        return $query
            ->where('mfg', 'like', '%' . $val . '%')
            ->OrWhere('exp', 'like', '%' . $val . '%')
            ->OrWhereHas('productDates', function ($query) use ($val) {
                $query->where('name_en', 'like', '%' . $val . '%')
                    ->OrWhere('sku', 'like', '%' . $val . '%');
            });
    }

    /*
        /-/for laravel scout to search in this field only
        ///NOTE Warning: Do NOT Index Sensitive Data:
        Any sensitive data that requires extreme security should be encrypted in the database to begin with. However, there could be other data that you don’t want index or returned with search results. Even such things as addresses.
    *Visit Reference:https://serversideup.net/search-eloquent-relationships-with-laravel-scout-and-meilisearch/
    */
    // public function toSearchableArray()
    // {
    //     $prExpiry = $this->with('productDates')
    //         ->whereId($this->id)
    //         ->first()
    //         ->toArray();
    //     return $prExpiry;
    // }
}
