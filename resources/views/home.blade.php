@extends('layouts.app')
@section('content')
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Start::page-header -->

        <div class="d-flex align-items-center justify-content-between my-4 page-header-breadcrumb flex-wrap gap-2">
            <div>
                <p class="fw-medium fs-20 mb-0">Welcome, {{ auth()->user()->fname }}</p>
                <p class="fs-13 text-muted mb-0"></p>
            </div>
        </div>

        <!-- End::page-header -->

        @include('layouts.dashboard.' . strtolower(auth()->user()->role))
    </div>
</div>
@endsection
