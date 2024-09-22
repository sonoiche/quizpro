@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <form action="{{ route('password.update') }}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}" />
                <div class="card custom-card my-4">
                    <div class="card-body p-5">
                        <div class="mb-3 d-flex justify-content-center">
                            <a href="{{ url('/') }}">
                                <img src="{{ url('assets/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo">
                                <img src="{{ url('assets/images/brand-logos/desktop-dark.png') }}" alt="logo" class="desktop-dark">
                            </a>
                        </div>
                        <p class="h5 mb-2 text-center">Reset Password</p>
                        <div class="row gy-3">
                            <div class="col-xl-12">
                                <label for="email" class="form-label text-default">Email Address</label>
                                <input type="email" name="email" class="form-control rounded-none" id="email" placeholder="Email Address" value="{{ $email ?? old('email') }}" />
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="signin-password" class="form-label text-default d-block">Password<a href="{{ route('password.request') }}" class="float-end text-danger">Forgot password?</a></label>
                                <div class="position-relative">
                                    <input type="password" name="password" class="form-control rounded-none" id="signin-password" placeholder="Password" />
                                    <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-12 mb-2">
                                <label for="signup-confirmpassword" class="form-label text-default">Confirm Password<sup>*</sup></label>
                                <div class="position-relative">
                                    <input type="password" name="password_confirmation" class="form-control form-control-lg" id="signup-confirmpassword" placeholder="Confirm password" />
                                    <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signup-confirmpassword',this)"  id="button-addon21"><i class="ri-eye-off-line align-middle"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-lg btn-primary">Reset Password</button>
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
