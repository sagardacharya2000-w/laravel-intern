<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'subscription_id',
        'plan_id',
        'amount',           // in PAISA
        'status',           // pending | success | failed
        'khalti_pidx',
        'khalti_txn_id',
        'failure_reason',
        'paid_at',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function plan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'plan_id');
    }

    public function amountInRupees(): float
    {
        return $this->amount / 100;
    }

    public function isSuccessful(): bool
    {
        return $this->status === 'success';
    }
}
