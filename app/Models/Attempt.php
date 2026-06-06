<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    protected $fillable = [
        'student_id',
        'question_set_id',
        'status',        // in_progress | submitted | timed_out
        'score',
        'total_marks',   // snapshot at attempt creation — never recomputed
        'started_at',
        'submitted_at',
    ];

    protected $casts = [
        'started_at'   => 'datetime',
        'submitted_at' => 'datetime',
    ];

    // ─── Relationships ───────────────────────────────────────────────────────────

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function questionSet()
    {
        return $this->belongsTo(QuestionSet::class);
    }

    public function answers()
    {
        return $this->hasMany(AttemptAnswer::class);
    }

    // ─── Helpers ────────────────────────────────────────────────────────────────

    /** Percentage score rounded to 2 decimal places */
    public function percentage(): float
    {
        if ($this->total_marks == 0) {
            return 0;
        }
        return round(($this->score / $this->total_marks) * 100, 2);
    }

    public function isSubmitted(): bool
    {
        return in_array($this->status, ['submitted', 'timed_out']);
    }
}
