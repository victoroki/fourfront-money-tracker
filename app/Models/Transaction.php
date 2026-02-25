<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['wallet_id', 'type', 'amount', 'description'];

    /**
     * Cast 'amount' to float for consistent arithmetic in balance calculations.
     */
    protected $casts = [
        'amount' => 'float',
    ];

    /**
     * A transaction belongs to a single wallet.
     */
    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }
}
