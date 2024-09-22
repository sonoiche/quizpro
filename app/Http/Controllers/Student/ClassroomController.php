<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\ExamTaken;
use App\Models\Teacher\Classroom;
use App\Models\Teacher\Exam;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $data['classrooms'] = Classroom::where('section', $user->section)->get();
        return view('student.classrooms.index', $data);
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
    public function show(string $id)
    {
        $data['classroom']  = Classroom::find($id);
        $data['taken']      = new ExamTaken();
        $data['exams']      = Exam::with(['takens' => function ($query) {
                $query->where('student_number', auth()->user()->student_number);
            }])
            ->withCount(['takens' => function ($query) {
                $query->where('student_number', auth()->user()->student_number);
            }])
            ->where('classroom_id', $id)
            ->get();

        return view('student.classrooms.show', $data);
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
