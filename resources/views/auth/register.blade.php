@extends('layout')

@section('title', 'Register')

@section('stylesheets')
@parent
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection
@section('content')

<section id="register" class="row">
    <aside class="row">
        <img src="{{ asset('images/registerPhoto.png') }}" alt="Image register" title="Image register" />
    </aside>
    <article>
        <a href="{{ route('home') }}"> <img src="{{ asset('images/logo_blanc.png') }}" alt="Logo from app" /></a>
        <h1>Create Account</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <!-- <x-input-label for="name" :value="__('Name')" /> -->
                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <!-- Email Address -->
            <div>
                <!-- <x-input-label for="email" :value="__('Email')" /> -->
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div>
                <!-- <x-input-label for="password" :value="__('Password')" /> -->

                <x-text-input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password" />

                <x-input-error :messages="$errors->get('password')" />
            </div>

            <!-- Confirm Password -->
            <div>
                <!-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" /> -->

                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password" />

                <x-input-error :messages="$errors->get('password_confirmation')" />
            </div>

            <div>
                <x-primary-button>
                    {{ __('Create') }}
                </x-primary-button>

            </div>
            <a href="{{ route('login') }}">
                {{ __('Already have an account?') }}
            </a>
        </form>
    </article>
</section>
@endsection