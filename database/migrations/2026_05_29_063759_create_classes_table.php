<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('name');                     // e.g. Grade 8 – Section A
            $table->string('grade_level', 100);         // e.g. Grade 10
            $table->string('academic_year', 20);        // e.g. 2081-82
            $table->string('class_code', 20)->unique(); // unique self-enroll code
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
