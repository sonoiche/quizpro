<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\UserRequest;
use App\Models\Admin\Section;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit($id)
    {
        $data['student']    = User::find($id);
        $data['sections']   = Section::where('college_year', auth()->user()->college_year)->get();
        return view('student.accounts.edit', $data);
    }

    public function update(UserRequest $request, $id)
    {
        $student = User::find($id);
        if(isset($request['password'])) {
            $student->password      = bcrypt($request['password']);
        }
        $student->contact_number    = $request['contact_number'];
        $student->college_year      = $request['year_level'];
        $student->section           = $request['section'];
        $student->student_number    = $student->student_number ?? $request['student_number'];
        $student->save();

        return redirect()->to('home')->with('success', 'Student information has been updated.');
    }

    public function show($year_level)
    {
        $data['sections'] = Section::where('college_year', $year_level)->get();
        return response()->json($data);
    }
}
