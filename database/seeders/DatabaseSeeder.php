<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Register and execute your custom UserSeeder here
        $this->call(UserSeeder::class);

        \App\Models\SubscriptionPlan::firstOrCreate(
            ['name' => 'Monthly'],
            ['duration_days' => 30, 'price' => 50000, 'description' => 'Full access for 1 month', 'is_active' => true]
        );

        \App\Models\SubscriptionPlan::firstOrCreate(
            ['name' => 'Yearly'],
            ['duration_days' => 365, 'price' => 500000, 'description' => 'Full access for 1 year', 'is_active' => true]
        );
    }
}
