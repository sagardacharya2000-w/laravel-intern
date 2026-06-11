<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttemptAnswer extends Model
{
    protected $fillable = [
        'attempt_id',
        'question_id',
        'selected_answer', // 'a' | 'b' | 'c' | 'd'
        'is_correct',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    // ─── Relationships ───────────────────────────────────────────────────────────

    public function attempt()
    {
        return $this->belongsTo(Attempt::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
