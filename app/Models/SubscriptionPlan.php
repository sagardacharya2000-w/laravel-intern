<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $fillable = [
        'name',
        'duration_days',
        'price',        // stored in PAISA (e.g. 100000 = Rs. 1,000) for Khalti compatibility
        'description',
        'is_active',
    ];

    // ─── Relationships ───────────────────────────────────────────────────────────

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    // ─── Helpers ────────────────────────────────────────────────────────────────

    /** Returns price in Rupees for display purposes */
    public function priceInRupees(): float
    {
        return $this->price / 100;
    }
}
