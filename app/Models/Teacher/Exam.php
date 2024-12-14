<?php

namespace App\Models\Teacher;

use App\Models\Student\ExamTaken;
use App\Models\Teacher\Classroom;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    protected $table = "exams";
    protected $guarded = [];
    protected $appends = ['created_date','deadline_date'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }

    public function takens()
    {
        return $this->hasMany(ExamTaken::class, 'exam_id');
    }

    public function getCreatedDateAttribute()
    {
        if($this->created_at) {
            return Carbon::parse($this->created_at)->format('d M, Y');
        }

        return '';
    }

    public function getDeadlineDateAttribute()
    {
        if($this->deadline) {
            return Carbon::parse($this->deadline)->format('d M, Y h:i A');
        }

        return '';
    }
}
