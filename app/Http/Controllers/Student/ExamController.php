<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\ExamTaken;
use App\Models\Teacher\Exam;
use App\Models\Teacher\ExamQuestion;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $exam_id    = $request['exam_id']; 
        $questions  = ExamQuestion::where('exam_id', $exam_id)->get();
        foreach ($questions as $question) {
            $answer = $request['answer_' . $question->id];
            $taken  = new ExamTaken();
            $taken->student_number  = auth()->user()->student_number;
            $taken->exam_id         = $exam_id;
            $taken->question_id     = $question->id;
            $taken->answer          = $answer;
            $taken->status          = (trim($answer) == trim($question->answer)) ? 'Correct' : 'Wrong';
            $taken->save();
        }

        return redirect()->to('student/classrooms');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['exam']       = Exam::find($id); 
        $data['questions']  = ExamQuestion::where('exam_id', $id)->get();

        return view('student.exams.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
