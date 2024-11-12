<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Teacher\Classroom;
use App\Models\Teacher\RoomStudent;
use App\Http\Controllers\Controller;
use App\DataTables\Teacher\ClassroomDataTable;
use App\Http\Requests\Teacher\ClassroomRequest;
use App\Models\Admin\Section;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ClassroomDataTable $dataTable)
    {
        $data['recordsTotal'] = $dataTable->recordsTotal + 1;
        return $dataTable->render('teacher.classrooms.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['sections'] = Section::orderBy('name')->get();
        return view('teacher.classrooms.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassroomRequest $request)
    {
        $classroom = new Classroom();
        $classroom->instructor_id   = auth()->user()->id;
        $classroom->name            = $request['name'];
        $classroom->section         = $request['section'];
        $classroom->subject         = $request['subject'];
        $classroom->subject_code    = $request['subject_code'];
        $classroom->schedule        = $request['schedule'];
        $classroom->schedule_time   = $request['schedule_time'];
        $classroom->save();

        return redirect()->to('teacher/classrooms')->with('success', 'Classroom has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['classroom']  = Classroom::with('students')->findOrFail($id);
        return view('teacher.classrooms.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['sections'] = Section::orderBy('name')->get();
        $data['classroom'] = Classroom::find($id);
        return view('teacher.classrooms.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassroomRequest $request, string $id)
    {
        $classroom = Classroom::find($id);
        $classroom->name            = $request['name'];
        $classroom->section         = $request['section'];
        $classroom->subject         = $request['subject'];
        $classroom->subject_code    = $request['subject_code'];
        $classroom->schedule        = $request['schedule'];
        $classroom->schedule_time   = $request['schedule_time'];
        $classroom->save();

        return redirect()->to('teacher/classrooms')->with('success', 'Classroom has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classroom = Classroom::find($id);
        $classroom->delete();

        return response()->json(200);
    }
}
