@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="card custom-card my-4">
                    <div class="card-body p-5">
                        <div class="mb-3 d-flex justify-content-center">
                            <a href="{{ url('/') }}">
                                <img src="{{ url('assets/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo">
                                <img src="{{ url('assets/images/brand-logos/desktop-dark.png') }}" alt="logo" class="desktop-dark">
                            </a>
                        </div>
                        <p class="h5 mb-2 text-center">Sign In</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome back!</p>
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="email" class="form-label text-default">Email Address</label>
                                <input type="email" name="email" class="form-control rounded-none" id="email" placeholder="Email Address" />
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="signin-password" class="form-label text-default d-block">Password<a href="{{ route('password.request') }}" class="float-end text-danger">Forgot password?</a></label>
                                <div class="position-relative">
                                    <input type="password" name="password" class="form-control rounded-none" id="signin-password" placeholder="Password" />
                                    <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                </div>
                                <div class="mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                            Remember password?
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-lg btn-primary">Sign In</button>
                        </div>
                        <div class="text-center">
                            <p class="text-muted mt-3 mb-0">Dont have an account? <a href="{{ url('register') }}" class="text-primary">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{!! JsValidator::formRequest('App\Http\Requests\Auth\LoginRequest') !!}
<script src="{{ url('assets/js/authentication-main.js') }}"></script>
<script src="{{ url('assets/js/show-password.js') }}"></script>
@endpush