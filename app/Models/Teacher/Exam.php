<?php

namespace App\Models\Teacher;

use App\Models\Student\ExamTaken;
use App\Models\Teacher\Classroom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    protected $table = "exams";
    protected $guarded = [];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function takens()
    {
        return $this->hasMany(ExamTaken::class, 'exam_id');
    }
}
