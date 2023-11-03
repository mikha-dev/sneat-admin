{{--
@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Login Basic - Pages')

@section('vendor-style')
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-auth.js')}}"></script>
@endsection

--}}
<div class="authentication-wrapper authentication-basic container-p-y">
<div class="authentication-inner">
    <!-- Register -->
    <div class="card">
    <div class="card-body">
        <!-- Logo -->
        <div class="app-brand justify-content-center">
        <a href="{{url('/')}}" class="app-brand-link gap-2">
            <span class="app-brand-logo"><img src="/storage/{!! config('admin.logo-image') !!}"></span>
            <span class="app-brand-text text-body fw-bold">{{config('admin.name')}}</span>
        </a>
        </div>
        <!-- /Logo -->
        <h4 class="mb-2">{{ __('admin.welcome_back') }}</h4>
        <p class="mb-4">{{ __('admin.please_sign_in') }}</p>

        <form id="formAuthentication" class="mb-3" action="{{ admin_url('auth/login') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="mb-3">
            <label for="username" class="form-label">{{ __('admin.email_or_username') }}</label>
            <input 
            type="text" 
            class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" 
            id="username" 
            name="username" 
            placeholder="{{ __('admin.email_or_username') }}" autofocus
            value="{{ old('username') }}"
        >
        </div>
        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
            <label class="form-label" for="password">{{ trans('admin.password') }}</label>
            @if(config('admin.auth.allow-reset-password'))
            <a href="{{url('auth/forgot-password')}}">
                <small>{{ __('admin.forgot_password') }}</small>
            </a>
            @endif
            </div>
            <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
            {{ __('admin.remember_me') }}
            </label>
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">{{ __('admin.sing_in') }}</button>
        </div>
        </form>

        @if(config('admin.auth.allow-register'))
        <p class="text-center">
        <span>{{ __('admin.new_on_platform') }}</span>
        <a href="{{url('auth/register')}}">
            <span>{{ __('admin.create_account') }}</span>
        </a>
        </p>
        @endif

        @if(config('admin.auth.allow-socials'))
        <div class="divider my-4">
            <div class="divider-text">{{ __('admin.or') }}</div>
        </div>

        <div class="d-flex justify-content-center">
        <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
            <i class="tf-icons bx bxl-facebook"></i>
        </a>

        <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
            <i class="tf-icons bx bxl-google-plus"></i>
        </a>

        <a href="javascript:;" class="btn btn-icon btn-label-twitter">
            <i class="tf-icons bx bxl-twitter"></i>
        </a>
        </div>
        @endif
    </div>
    </div>
</div>
</div>
<script>
    Dcat.ready(function () {
        $('#formAuthentication').form({
            validate: true,
        });
    });
</script>