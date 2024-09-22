<?php

namespace App\Models\Student;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamTaken extends Model
{
    use HasFactory;

    protected $table = "exam_takens";
    protected $guarded = [];
    protected $appends = ['created_date'];

    public function getCreatedDateAttribute()
    {
        $created_at = $this->attributes['created_at'] ?? '';
        if($created_at) {
            return Carbon::parse($created_at)->format('F d, Y');
        }

        return '';
    }

    public function displayScore($student_number, $exam)
    {
        if(isset($exam->display_student_score)) {
            return $this->where('student_number', $student_number)
                ->where('exam_id', $exam->id)
                ->where('status', 'Correct')
                ->sum('status');
        }

        return 'NA';
    }

    public function displayStatus($student_number, $exam)
    {
        if(isset($exam->display_student_score)) {
            return ($this->displayScore($student_number, $exam->id) >= $exam->passing_grade) ? 'Passed' : 'Failed';
        }

        return 'NA';
    }
}
