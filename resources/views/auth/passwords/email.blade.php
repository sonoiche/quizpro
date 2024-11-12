@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="card custom-card my-4">
                    <div class="card-body p-5">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="mb-3 d-flex justify-content-center">
                            <a href="{{ url('/') }}" class="text-center">
                                <img src="{{ url('logo1.png') }}" alt="logo" style="width: 40%">
                            </a>
                        </div>
                        <p class="h5 mb-2 text-center">Reset Password</p>
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="email" class="form-label text-default">Email Address</label>
                                <input type="email" name="email" class="form-control rounded-none" id="email" placeholder="Email Address" />
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-lg btn-primary">Send Password Reset Link</button>
                        </div>
                        <div class="text-center">
                            <p class="text-muted mt-3 mb-0">Already have an account? <a href="{{ route('login') }}" class="text-primary">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Auth\ForgotPasswordRequest') !!}
@endpush