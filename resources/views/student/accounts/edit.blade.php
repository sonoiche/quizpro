@extends('layouts.app')
@section('content')
<div class="main-content app-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-6 col-xl-6 col-xxl-6">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Update Student Information</div>
                    </div>
                    <div class="card-body p-3">
                        <form action="{{ url('student/accounts', $student->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                @include('student.accounts.form')
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ url('student/accounts') }}" class="btn btn-outline-danger me-2">Back</a>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                            <input type="hidden" name="id" value="{{ $student->id }}" />
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
{!! JsValidator::formRequest('App\Http\Requests\Student\UserRequest') !!}
@endpush