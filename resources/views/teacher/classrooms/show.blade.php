@extends('layouts.app')
@section('content')
<div class="main-content app-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12 col-xl-12 col-xxl-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">{{ $classroom->name }}</div>
                        <div class="dropdown">
                            {{ $classroom->section }}
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Student Number</th>
                                        <th>Student Name</th>
                                        <th>Email Address</th>
                                        <th>Contact Number</th>
                                        <th class="text-center">Last Login</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($classroom->students as $student)
                                    <tr>
                                        <td class="text-center">{{ $student->student_number }}</td>
                                        <td>{{ $student->fullname }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->contact_number }}</td>
                                        <td class="text-center">{{ $student->last_login_date }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-primary" href="{{ url('teacher/students', $student->student_number) }}?classroom_id={{ $classroom->id }}">
                                                View Exams
                                            </a>
                                        </td>
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