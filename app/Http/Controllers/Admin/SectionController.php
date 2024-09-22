<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SectionDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SectionRequest;
use App\Models\Admin\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SectionDataTable $dataTable)
    {
        $data['recordsTotal'] = $dataTable->recordsTotal + 1;
        return $dataTable->render('admin.sections.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request)
    {
        $section = new Section();
        $section->name          = $request['name'];
        $section->college_year  = $request['college_year'];
        $section->status        = $request['status'];
        $section->save();

        return redirect()->to('admin/sections')->with('success', 'College section has been added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['section'] = Section::find($id);
        return view('admin.sections.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $section = Section::find($id);
        $section->name          = $request['name'];
        $section->college_year  = $request['college_year'];
        $section->status        = $request['status'];
        $section->save();

        return redirect()->to('admin/sections')->with('success', 'College section has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $section = Section::find($id);
        $section->delete();

        return response()->json(200);
    }
}
