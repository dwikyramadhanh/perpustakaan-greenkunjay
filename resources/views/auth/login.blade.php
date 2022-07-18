@extends('frontend.templates.default')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/dist/css/login-logout-background.css') }}">
@endpush
@section('content')
<div class="container" style="margin-top: 6vh">
    <div class="col s12 m6">
        <div class="card">
            <div class="card-content">
                <div class="card-title">
                    <blockquote>
                        <h5>Login Perpustakaan</h5>
                    </blockquote>
                </div>
                <form action="{{ route('login') }}" class="col s12" method="POST" novalidate>
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="email" class="validate @error('email') invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                            <label for="email">{{ __('Email Address') }}</label>
                            @error('email')
                            <span class="helper-text" data-error="{{ $message }}"></span>
                            @enderror
                        </div>

                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="password" class="@error('password') invalid @enderror" name="password">
                            <label for="password">{{ __('Password') }}</label>
                            @error('password')
                            <span class="helper-text" data-error="{{ $message }}"></span>
                            @enderror
                        </div>
                        <div class="input field right">
                            <input type="submit" value="Login" class="vawes-effect waves-light btn cyan lighten-1">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


