<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolClass extends Model
{
    use SoftDeletes;

    /**
     * Map to the 'classes' table.
     * We cannot name the PHP class "Class" (reserved keyword),
     * so we use SchoolClass and declare the table explicitly.
     */
    protected $table = 'classes';

    protected $fillable = [
        'teacher_id',
        'name',
        'grade_level',
        'academic_year',
        'class_code',
    ];

    // ─── Relationships ───────────────────────────────────────────────────────────

    /** The teacher assigned to this class */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id')->withTrashed();
    }

    /** Students enrolled in this class (many-to-many) */
    public function students()
    {
        return $this->belongsToMany(
            User::class,
            'class_student',
            'class_id',
            'student_id'
        );
    }

    /** Exam access windows assigned to this class */
    public function examAccesses()
    {
        return $this->hasMany(ExamAccess::class, 'class_id');
    }
}
