<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'subscription_id',
        'amount',           // in PAISA — matches Khalti's requirement
        'status',           // pending | success | failed
        'khalti_pidx',      // Payment ID from Khalti initiate response
        'khalti_txn_id',    // Transaction ID from Khalti lookup response
        'failure_reason',
        'paid_at',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    // ─── Relationships ───────────────────────────────────────────────────────────

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    // ─── Helpers ────────────────────────────────────────────────────────────────

    public function amountInRupees(): float
    {
        return $this->amount / 100;
    }

    public function isSuccessful(): bool
    {
        return $this->status === 'success';
    }
}
