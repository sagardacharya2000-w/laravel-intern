<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'subscription_plan_id',
        'status',      // active | expired | cancelled
        'starts_at',
        'expires_at',
    ];

    protected $casts = [
        'starts_at'  => 'datetime',
        'expires_at' => 'datetime',
    ];

    // ─── Relationships ───────────────────────────────────────────────────────────

    public function plan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // ─── Helpers ────────────────────────────────────────────────────────────────

    public function isActive(): bool
    {
        return $this->status === 'active' && now()->lte($this->expires_at);
    }

    /** Days remaining until expiry */
    public function daysRemaining(): int
    {
        if ($this->isExpired()) {
            return 0;
        }
        return (int) now()->diffInDays($this->expires_at);
    }

    public function isExpired(): bool
    {
        return $this->status === 'expired' || now()->gt($this->expires_at);
    }
}
