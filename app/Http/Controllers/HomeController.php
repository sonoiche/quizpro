<?php

namespace App\Http\Controllers;

use App\Models\Student\ExamTaken;
use App\Models\Teacher\Classroom;
use App\Models\Teacher\Exam;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $data['classrooms'] = [];

        // Admin
        if($user->role == User::ROLE_ADMIN) {
            $data['enrolledStudents']   = User::where('role', User::ROLE_STUDENT)->count();
            $data['classroomCount']     = Classroom::count();
            $data['totalExams']         = Exam::count();
            $data['teacherCount']       = User::where('role', User::ROLE_INSTRUCTOR)->count();
        }
        // Instructor
        if($user->role == User::ROLE_INSTRUCTOR) {
            $data['classrooms'] = Classroom::where('instructor_id', $user->id)->get();
        }
        // Students
        if($user->role == User::ROLE_STUDENT) {
            $data['classrooms']     = Classroom::where('section', $user->section)->get();
            $classroom_ids          = Classroom::where('section', $user->section)->pluck('id');
            $data['availableExam']  = Exam::whereIn('classroom_id', $classroom_ids)->count();
            $data['takenExam']      = ExamTaken::where('student_number', $user->student_number)->groupBy('exam_id')->get();

            $exams  = Exam::whereIn('classroom_id', $classroom_ids)->get();
            $passed = 0;
            foreach ($exams as $exam) {
                $score = ExamTaken::where('student_number', $user->student_number)
                    ->where('exam_id', $exam->id)
                    ->where('status', 'Correct')
                    ->sum('status');
                
                if($score >= $exam->passing_grade) {
                    $passed += 1;
                }
            }

            $data['passExam']       = $passed;
        }
        return view('home', $data);
    }
}
