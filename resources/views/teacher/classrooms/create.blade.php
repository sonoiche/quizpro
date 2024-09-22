@extends('layouts.app')
@section('content')
<div class="main-content app-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-6 col-xl-6 col-xxl-6">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Create Room</div>
                    </div>
                    <div class="card-body p-3">
                        <form action="{{ url('teacher/classrooms') }}" method="post">
                            @csrf
                            <div class="row">
                                @include('teacher.classrooms.form')
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ url('teacher/classrooms') }}" class="btn btn-outline-danger me-2">Back</a>
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

@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Teacher\ClassroomRequest') !!}
@endpush