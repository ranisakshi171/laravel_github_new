<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Investment extends Model
{
    protected $fillable = [
        'user_id', 'stock_id', 'type', 'amount', 'units',
        'purchase_price', 'current_value', 'returns', 'status', 'fund_name'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'units' => 'decimal:4',
        'purchase_price' => 'decimal:2',
        'current_value' => 'decimal:2',
        'returns' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }
}
