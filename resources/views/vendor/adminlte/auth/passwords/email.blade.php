@extends('adminlte::auth.auth-page', ['authType' => 'login'])

@php
    $loginUrl = View::getSection('login_url') ?? config('adminlte.login_url', 'login');
    $passwordEmailUrl =
        View::getSection('password_email_url') ?? config('adminlte.password_email_url', 'password/email');

    if (config('adminlte.use_route_url', false)) {
        $loginUrl = $loginUrl ? route($loginUrl) : '';
        $passwordEmailUrl = $passwordEmailUrl ? route($passwordEmailUrl) : '';
    } else {
        $loginUrl = $loginUrl ? url($loginUrl) : '';
        $passwordEmailUrl = $passwordEmailUrl ? url($passwordEmailUrl) : '';
    }
@endphp

@section('auth_header', __('adminlte::adminlte.password_reset_message'))

@section('auth_body')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ $passwordEmailUrl }}" method="post">
        @csrf

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Submit button --}}
        <div class="row">
            <div class="col-12">
                <button type="submit"
                    class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                    <span class="fas fa-share-square"></span>
                    Kirim Link Reset Password
                </button>
            </div>
        </div>
    </form>
@stop

@section('auth_footer')
    <p class="my-0 mt-3">
        <a href="{{ $loginUrl }}">
           Saya Sudah Punya Akun
        </a>
    </p>
@stop
