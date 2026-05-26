<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'stock_id', 'type', 'quantity',
        'price_per_unit', 'total_amount', 'brokerage'
    ];

    protected $casts = [
        'price_per_unit' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'brokerage' => 'decimal:2',
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
