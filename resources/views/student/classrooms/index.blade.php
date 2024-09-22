@extends('layouts.app')
@section('content')
<div class="main-content app-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12 col-xl-12 col-xxl-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Manage Classes</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="{{ count($classrooms) > 3 ? 'table-responsive' : '' }}">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Classroom</th>
                                        <th>Subject</th>
                                        <th class="text-center"># of Exams</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classrooms as $key => $classroom)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td>{{ $classroom->name }}</td>
                                        <td>{{ $classroom->subject }}</td>
                                        <td class="text-center">{{ count($classroom->exams) }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-primary" href="{{ url('student/classrooms', $classroom->id) }}">
                                                View Exams
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
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