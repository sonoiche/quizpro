@extends('layouts.app')
@section('content')
<div class="main-content app-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-6 col-xl-6 col-xxl-6">
                <div class="card custom-card overflow-hidden">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Update Account Information</div>
                    </div>
                    <div class="card-body p-3">
                        <form action="{{ url('account') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="fname" class="form-label">First Name</label>
                                        <input type="text" name="fname" id="fname" class="form-control rounded-1" value="{{ $user->fname ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="lname" class="form-label">Last Name</label>
                                        <input type="text" name="lname" id="lname" class="form-control rounded-1" value="{{ $user->lname ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" id="email" class="form-control rounded-1" value="{{ $user->email ?? '' }}" readonly />
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="contact_number" class="form-label">Contact Number</label>
                                        <input type="text" name="contact_number" id="contact_number" class="form-control rounded-1" value="{{ $user->contact_number ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control rounded-1" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control rounded-1" />
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ url('home') }}" class="btn btn-outline-danger me-2">Back</a>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                            <input type="hidden" name="id" value="{{ auth()->user()->id }}" />
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
{!! JsValidator::formRequest('App\Http\Requests\Admin\UserRequest') !!}
@endpush