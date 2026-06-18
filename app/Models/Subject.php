<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'created_by',  
        'name',
        'description',
    ];

    // ─── Relationships ───────────────────────────────────────────────────────────

    public function teacher()
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }

    public function questionSets()
    {
        return $this->hasMany(QuestionSet::class);
    }
}
