<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stock extends Model
{
    protected $fillable = [
        'symbol', 'company_name', 'sector', 'price', 'previous_price',
        'change_percentage', 'market_cap', 'volume', 'logo',
        'is_trending', 'is_top_gainer', 'is_top_loser'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'previous_price' => 'decimal:2',
        'change_percentage' => 'decimal:2',
        'market_cap' => 'decimal:2',
        'is_trending' => 'boolean',
        'is_top_gainer' => 'boolean',
        'is_top_loser' => 'boolean',
    ];

    public function investments(): HasMany
    {
        return $this->hasMany(Investment::class);
    }

    public function watchlists(): HasMany
    {
        return $this->hasMany(Watchlist::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function scopeTrending($query)
    {
        return $query->where('is_trending', true);
    }

    public function scopeGainers($query)
    {
        return $query->where('is_top_gainer', true);
    }

    public function scopeLosers($query)
    {
        return $query->where('is_top_loser', true);
    }
}
