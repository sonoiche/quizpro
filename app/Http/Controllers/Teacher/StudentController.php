<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Student\ExamTaken;
use App\Models\Teacher\Classroom;
use App\Models\Teacher\Exam;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id          = auth()->user()->id;
        $data['students'] = User::where('role', User::ROLE_STUDENT)->orderBy('fname')->get();
        $data['sections'] = Classroom::where('instructor_id', $user_id)->orderBy('name')->get();
        return view('teacher.students.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $exam_ids           = ExamTaken::where('student_number', $id)->distinct('exam_id')->pluck('exam_id');
        $classroom_id       = $request['classroom_id'];
        $data['student']    = User::where('student_number', $id)->first();
        $data['exams']      = Exam::whereIn('id', $exam_ids)->where('classroom_id', $classroom_id)->get();
        $data['taken']      = new ExamTaken();

        return view('teacher.students.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user_id            = auth()->user()->id;
        $data['students']   = User::where('role', User::ROLE_STUDENT)->orderBy('fname')->get();
        $data['classroom']  = Classroom::where('instructor_id', $user_id)->where('section', $id)->orderBy('name')->first();
        return view('teacher.students.index', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
