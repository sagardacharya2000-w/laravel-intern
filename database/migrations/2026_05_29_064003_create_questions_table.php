<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_set_id')->constrained('question_sets')->cascadeOnDelete();
            $table->text('prompt');                       // Question text
            $table->string('option_a');
            $table->string('option_b');
            $table->string('option_c');
            $table->string('option_d');
            $table->enum('correct_answer', ['A', 'B', 'C', 'D']);
            $table->unsignedTinyInteger('marks')->default(1);
            $table->unsignedInteger('order')->default(0); // for non-randomized ordering
            $table->softDeletes();
            $table->timestamps();

            $table->index('question_set_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
