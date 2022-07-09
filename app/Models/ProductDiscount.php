<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class ProductDiscount extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'product_id', 'name', 'description', 'discount_percent', 'discounted_price'
    ];

    public function productDiscount()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /*
        /-/for laravel scout to search in this field only
        ///FIXME Warning: Do NOT Index Sensitive Data:
        Any sensitive data that requires extreme security should be encrypted in the database to begin with. However, there could be other data that you don’t want index or returned with search results. Even such things as addresses.
    *Visit Reference:https://serversideup.net/search-eloquent-relationships-with-laravel-scout-and-meilisearch/
    */
    public function toSearchableArray()
    {
        $discount = $this->with('productDiscount')
            ->whereId($this->id)
            ->first()
            ->toArray();
        return $discount;
    }


    /*
        -return float value if there is a number like 33.326
        -outputs would be like:
        /- 625.38
        /- 1,211.00
    */
    public function getDiscountedPriceAttribute($val)
    {
        return number_format((float)round($val, 2, PHP_ROUND_HALF_DOWN), 2, '.', ',');
    }
}
