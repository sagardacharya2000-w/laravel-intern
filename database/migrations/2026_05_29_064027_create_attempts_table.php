<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('question_set_id')->constrained('question_sets')->cascadeOnDelete();
            $table->enum('status', ['in_progress', 'submitted', 'timed_out'])->default('in_progress');
            $table->unsignedInteger('score')->default(0);
            // Snapshot total_marks at attempt creation — stays accurate even if questions are later edited
            $table->unsignedInteger('total_marks');
            $table->timestamp('started_at')->useCurrent();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();

            // A student can re-attempt the same exam, so no unique constraint here
            $table->index(['student_id', 'question_set_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attempts');
    }
};
