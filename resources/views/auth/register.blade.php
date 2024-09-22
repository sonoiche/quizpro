@extends('layouts.app')
@section('content')
<div class="container-lg">
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12">
            <form action="{{ url('register') }}" method="post">
                @csrf
                <div class="card custom-card my-4">
                    <div class="card-body p-5">
                        <div class="mb-3 d-flex justify-content-center">
                            <a href="{{ url('/') }}">
                                <img src="{{ url('assets/images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo">
                                <img src="{{ url('assets/images/brand-logos/desktop-dark.png') }}" alt="logo" class="desktop-dark">
                            </a>
                        </div>
                        <p class="h5 mb-2 text-center">Sign Up</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome & Join us by creating a free account!</p>
                        <div class="row gy-3">
                            <div class="col-xl-6">
                                <label for="fname" class="form-label text-default">First Name<sup>*</sup></label>
                                <input type="text" name="fname" class="form-control form-control-lg" id="fname" placeholder="First name" />
                            </div>
                            <div class="col-xl-6">
                                <label for="lname" class="form-label text-default">Last Name<sup>*</sup></label>
                                <input type="text" name="lname" class="form-control form-control-lg" id="lname" placeholder="Last name" />
                            </div>
                            <div class="col-xl-12">
                                <label for="email" class="form-label text-default">Email Address<sup>*</sup></label>
                                <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Email Address" />
                            </div>
                            <div class="col-xl-6">
                                <label for="signup-password" class="form-label text-default">Password<sup>*</sup></label>
                                <div class="position-relative">
                                    <input type="password" name="password" class="form-control form-control-lg" id="signup-password" placeholder="Password" />
                                    <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signup-password',this)"  id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <label for="signup-confirmpassword" class="form-label text-default">Confirm Password<sup>*</sup></label>
                                <div class="position-relative">
                                    <input type="password" name="password_confirmation" class="form-control form-control-lg" id="signup-confirmpassword" placeholder="Confirm password" />
                                    <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signup-confirmpassword',this)"  id="button-addon21"><i class="ri-eye-off-line align-middle"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-check">
                                    <input class="form-check-input" name="terms" type="checkbox" value="1" id="terms_conditions">
                                    <label class="form-check-label text-muted fw-normal" for="terms_conditions">
                                        By creating an account you agree to our <a href="#" class="text-success"><u>Terms & Conditions</u></a> and <a class="text-success"><u>Privacy Policy</u></a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-lg btn-primary">Create Account</button>
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
{!! JsValidator::formRequest('App\Http\Requests\Auth\RegisterRequest') !!}
<script src="{{ url('assets/js/authentication-main.js') }}"></script>
<script src="{{ url('assets/js/show-password.js') }}"></script>
@endpush