<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question_set_id',
        'prompt',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
        'marks',
    ];

    // ─── Relationships ───────────────────────────────────────────────────────────

    public function questionSet()
    {
        return $this->belongsTo(QuestionSet::class);
    }

    public function attemptAnswers()
    {
        return $this->hasMany(AttemptAnswer::class);
    }
}
