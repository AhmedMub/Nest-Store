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

    public function productExpiry()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function remainingDays()
    {

        return Carbon::parse($this->mfg)->diffInDays(Carbon::parse($this->exp), false);
    }

    /*
        /-/for laravel scout to search in this field only
        ///FIXME Warning: Do NOT Index Sensitive Data:
        Any sensitive data that requires extreme security should be encrypted in the database to begin with. However, there could be other data that you don’t want index or returned with search results. Even such things as addresses.
    *Visit Reference:https://serversideup.net/search-eloquent-relationships-with-laravel-scout-and-meilisearch/
    */
    public function toSearchableArray()
    {
        $prExpiry = $this->with('productExpiry')
            ->whereId($this->id)
            ->first()
            ->toArray();
        return $prExpiry;
    }
}
