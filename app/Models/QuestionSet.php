<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionSet extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'created_by',
        'subject_id',
        'title',
        'time_limit_minutes',
        'is_randomized',
        'is_premium',
    ];

    protected $casts = [
        'is_randomized' => 'boolean',
        'is_premium' => 'boolean',
    ];

    // ─── Relationships ───────────────────────────────────────────────────────────

    public function teacher()
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function examAccesses()
    {
        return $this->hasMany(ExamAccess::class);
    }

    public function attempts()
    {
        return $this->hasMany(Attempt::class);
    }
}
