<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'teacher_id',
        'name',
        'description',
    ];

    // ─── Relationships ───────────────────────────────────────────────────────────

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id')->withTrashed();
    }

    public function questionSets()
    {
        return $this->hasMany(QuestionSet::class);
    }
}
