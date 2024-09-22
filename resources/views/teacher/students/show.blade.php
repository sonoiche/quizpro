@extends('layouts.app')
@section('content')
<div class="main-content app-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12 col-xl-12 col-xxl-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">{{ $student->fullname }} List of Exams</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="{{ count($exams) > 3 ? 'table-responsive' : '' }}">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Title</th>
                                        <th class="text-center"># of Items</th>
                                        <th class="text-center">Score</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Date Taken</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exams as $key => $exam)
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td>{{ $exam->name }}</td>
                                        <td class="text-center">{{ $exam->items }}</td>
                                        <td class="text-center">{{ $taken->displayScore($student->student_number, $exam) }}</td>
                                        <td class="text-center">{{ $taken->displayStatus($student->student_number, $exam) }}</td>
                                        <td class="text-center">{{ $exam->takens[0]->created_date }}</td>
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