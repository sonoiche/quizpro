<?php

namespace App\Models\Teacher;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $table = "classrooms";
    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(User::class, 'section', 'section')->where('role', User::ROLE_STUDENT);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'classroom_id');
    }
}
