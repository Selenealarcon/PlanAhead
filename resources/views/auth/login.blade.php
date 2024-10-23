@extends('layout')

@section('title', 'Spaces')

@section('stylesheets')
@parent
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection
@section('content')

<!-- Session Status -->
<x-auth-session-status :status="session('status')" />
<section id="login" class="row">
    <article>
    <a href="{{ route('home') }}"> <img src="{{ asset('images/logo_blanc.png') }}" alt="Logo from app" /></a>
        <h1>Welcome Back!</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error class="error" :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />

                <x-input-error class="error" :messages="$errors->get('password')" />
            </div>

            <!-- Remember Me -->
            <div id="remember">
                <label for="remember_me" class="row">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>{{ __('Remember me') }}</span>
                </label>
            </div>

            <div>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
                <x-primary-button>
                    {{ __('Log in') }}
                </x-primary-button>
                <a href="{{ route('register') }}">
                    {{ __('Don\'t have an account? Register') }}
                </a>
            </div>
        </form>
    </article>
    <aside class="row">
        <img src="{{ asset('images/loginPhoto.png') }}" alt="Image login" title="Image login" />

    </aside>
</section>


@endsection