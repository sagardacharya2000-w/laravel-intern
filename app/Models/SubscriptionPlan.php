<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $fillable = [
        'name',
        'duration_days',
        'price',        // in PAISA (e.g. 100000 = Rs. 1,000) for Khalti
        'description',
        'is_active',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'plan_id');
    }

    public function priceInRupees(): float
    {
        return $this->price / 100;
    }

    public function expiryFromNow(): \Illuminate\Support\Carbon
    {
        return now()->addDays($this->duration_days);
    }
}