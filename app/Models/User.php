<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    // ─── Role Helpers ───────────────────────────────────────────────────────────

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isTeacher(): bool
    {
        return $this->role === 'teacher';
    }

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    // ─── Relationships ───────────────────────────────────────────────────────────

    /** Classes where this user is the assigned teacher */
    public function taughtClasses()
    {
        return $this->hasMany(SchoolClass::class, 'teacher_id');
    }

    /** Classes this student is enrolled in */
    public function enrolledClasses()
    {
        return $this->belongsToMany(
            SchoolClass::class,
            'class_student',
            'student_id',
            'class_id'
        );
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'teacher_id');
    }

    public function questionSets()
    {
        return $this->hasMany(QuestionSet::class, 'teacher_id');
    }

    public function attempts()
    {
        return $this->hasMany(Attempt::class, 'student_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
