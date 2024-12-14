@extends('layouts.app')
@section('content')
<div class="main-content app-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-8 col-xl-8 col-xxl-8">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">{{ $exam->name }} - {{ $exam->items }} items</div>
                    </div>
                    <div class="card-body p-0">
                        @session('error')
                        <div class="alert alert-danger" role="alert" style="margin-top: 20px; width: 95%; margin: 0 auto">
                            {{ session('error') }}
                        </div>
                        @endsession
                        <form action="{{ url('student/exams') }}" method="post">
                            @csrf
                            <div class="row">
                                @foreach ($questions as $question)
                                <div class="col-md-12 m-4">
                                    <div class="py-0">
                                        <p>{{ $question->question }}</p>
                                    </div>
                                    <div class="py-2 ml-5">
                                        @php
                                            $options = explode(',', $question->options);
                                            $results = [];
                                        @endphp
                                        @foreach ($options as $option)
                                            @if (preg_match('/([a-d])\) (.+)/', $option, $matches))
                                                <?php $results[$matches[1]] = $matches[2]; ?>
                                            @endif
                                        @endforeach
                                        
                                        @if ($exam->test_type === 2)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="answer_{{ $question->id }}" id="true_{{ $question->id }}" value="True" />
                                                <label class="form-check-label" for="true_{{ $question->id }}">True</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="answer_{{ $question->id }}" id="false_{{ $question->id }}" value="False" />
                                                <label class="form-check-label" for="false_{{ $question->id }}">False</label>
                                            </div>
                                        @elseif($exam->test_type === 3)
                                            <div class="form-group" style="width: 90%">
                                                <input type="text" name="answer_{{ $question->id }}" id="answer_{{ $question->id }}" class="form-control" />
                                            </div>
                                        @else
                                            @foreach ($results as $key => $result)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="answer_{{ $question->id }}" id="answer_{{ $question->id.'_'.$key }}" value="{{ $key . ') ' . $result }}" />
                                                    <label class="form-check-label" for="answer_{{ $question->id.'_'.$key }}">
                                                        {{ $key . ') ' . $result }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3 mt-3">
                                    <div class="d-flex justify-content-end" style="width: 99%">
                                        <input type="hidden" name="exam_id" value="{{ $exam->id }}" />
                                        <button class="btn btn-primary" type="submit">Submit the Exam</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection