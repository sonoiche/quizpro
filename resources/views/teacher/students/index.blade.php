@extends('layouts.app')
@section('content')
<div class="main-content app-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12 col-xl-12 col-xxl-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">List of Students &mdash; {{ $classroom->name }}</div>
                        <div class="dropdown">
                            <h6>{{ $classroom->section }}</h6>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Student Number</th>
                                        <th class="text-center">Exam Taken</th>
                                        <th>Student Name</th>
                                        <th>Email Address</th>
                                        <th>Contact Number</th>
                                        <th>Last Login</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $key => $student)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td>
                                            <a href="{{ url('teacher/students', $student->student_number) }}?classroom_id={{ $classroom->id }}" class="text-primary">{{ $student->student_number }}</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('teacher/students', $student->student_number) }}?classroom_id={{ $classroom->id }}" class="text-primary">{{ $student->examTaken() }}</a>
                                        </td>
                                        <td>{{ $student->fullname }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->contact_number }}</td>
                                        <td>{{ $student->last_login_date }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No data available</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection