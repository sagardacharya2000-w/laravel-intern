<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamAccess extends Model
{
    protected $table = 'exam_access';

    protected $fillable = [
        'class_id',
        'question_set_id',
        'scheduled_at',
        'expires_at',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'expires_at'   => 'datetime',
    ];

    // ─── Relationships ───────────────────────────────────────────────────────────

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function questionSet()
    {
        return $this->belongsTo(QuestionSet::class);
    }

    public function attempts()
{
    return $this->hasMany(Attempt::class, 'question_set_id', 'question_set_id');
}

    // ─── Helpers ────────────────────────────────────────────────────────────────

    /** Is the exam window currently open? */
    public function isActive(): bool
    {
        $now = now();
        return $now->gte($this->scheduled_at) && $now->lte($this->expires_at);
    }

    /** Has the exam window not started yet? */
    public function isUpcoming(): bool
    {
        return now()->lt($this->scheduled_at);
    }

    /** Has the exam window already closed? */
    public function isExpired(): bool
    {
        return now()->gt($this->expires_at);
    }
}
