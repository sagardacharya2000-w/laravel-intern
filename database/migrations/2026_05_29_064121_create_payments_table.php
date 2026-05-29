<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')->nullable()->constrained('subscriptions')->nullOnDelete();
            $table->foreignId('plan_id')->constrained('subscription_plans')->restrictOnDelete();
            $table->unsignedInteger('amount');              // in paisa
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');

            // Khalti-specific fields
            $table->string('khalti_pidx')->unique()->nullable();    // Payment ID from initiate call
            $table->string('khalti_txn_id')->nullable();            // Transaction ID on success
            $table->text('failure_reason')->nullable();

            $table->timestamp('paid_at')->nullable();
            // Never deleted — permanent payment audit trail
            $table->timestamps();

            $table->index('khalti_pidx');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
