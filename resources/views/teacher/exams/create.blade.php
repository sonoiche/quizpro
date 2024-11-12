@extends('layouts.app')
@section('content')
<div class="main-content app-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-6 col-xl-6 col-xxl-6">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Create Assessment Tests</div>
                    </div>
                    <div class="card-body p-3">
                        <form action="{{ url('teacher/exams') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @include('teacher.exams.form')
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ url('teacher/exams') }}" class="btn btn-outline-danger me-2">Back</a>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
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

@section('css')
<link rel="stylesheet" href="{{ url('assets/libs/choices.js/public/assets/styles/choices.min.css') }}">
@endsection

@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Teacher\ExamRequest') !!}
<script src="{{ url('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
<script>
const element = document.querySelector('#choices-multiple-remove-button');
const choices = new Choices(element, {
    searchEnabled: true,
    inputType: 'select-multiple',
    removeItemButton: true
});
</script>
@endpush