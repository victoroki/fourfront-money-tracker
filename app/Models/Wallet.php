<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wallet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['user_id', 'name'];

    /**
     * A wallet belongs to a single user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A wallet has many transactions (both income and expense).
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Calculate this wallet's current balance dynamically from its transactions.
     *
     * Income transactions increase the balance; expense transactions decrease it.
     * This is an Eloquent accessor, accessible as $wallet->balance.
     *
     * @return float
     */
    public function getBalanceAttribute(): float
    {
        $income  = $this->transactions->where('type', 'income')->sum('amount');
        $expense = $this->transactions->where('type', 'expense')->sum('amount');

        return (float) ($income - $expense);
    }
}
