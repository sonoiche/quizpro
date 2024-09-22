<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Student\ExamTaken;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $appends = ['fullname','profile_photo','last_login_date'];

    CONST ROLE_ADMIN = 'Admin';
    CONST ROLE_INSTRUCTOR = 'Teacher';
    CONST ROLE_STUDENT = 'Student';

    public function getFullnameAttribute()
    {
        $fname = $this->attributes['fname'] ?? '';
        $lname = $this->attributes['lname'] ?? '';
        if($fname && $lname) {
            return $fname . ' ' . $lname;
        }

        return '';
    }

    public function getProfilePhotoAttribute()
    {
        $photo = $this->attributes['photo'] ?? '';

        if($photo) {
            return url($photo);
        }

        $fullname = $this->fullname;
        if($fullname !== '') {
            return 'https://ui-avatars.com/api/?name='.$fullname.'&background=random';
        }

    }

    public function getLastLoginDateAttribute()
    {
        $last_login_at = $this->attributes['last_login_at'] ?? '';
        if($last_login_at) {
            return Carbon::parse($last_login_at)->format('F d, Y H:i A');
        }

        return '';
    }

    public function isAdmin()
    {
        return $this->role === 'Admin';
    }

    public function isTeacher()
    {
        return $this->role === 'Teacher';
    }

    public function isStudent()
    {
        return $this->role === 'Student';
    }

    public function student_exams()
    {
        return $this->hasMany(ExamTaken::class, 'student_number', 'student_number');
    }

    public function examTaken()
    {
        return ExamTaken::where('student_number', $this->student_number)->distinct('exam_id')->count('exam_id');
    }
}
