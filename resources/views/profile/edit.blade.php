@extends('layout')

@section('title', 'Edit space')

@section('stylesheets')
@parent
@endsection
@include('header')
@push('scripts')
<script src="{{ asset('js/scripts.js') }}"></script>
@endpush
@section('content')
<section id="editProfile" class="hybrid m0a">
    <div class="breadcrumb">
        {{ Breadcrumbs::render() }}
    </div>
    <h2>
        {{ __('Profile') }}
    </h2>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form method="POST" action="{{ route('profile.update') }}" class="row" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="w50 row">
            @if($user->photo)
            <img src="{{ asset('images/users/' . $user->photo)}}" class="userPhoto m0a" id="editPhotoProfile" alt="Default photo of profile">
            @else
            <img src="{{ asset('images/profileSpace.png') }}" class="userPhoto m0a" id="editPhotoProfile" alt="Default Photo">
            @endif
            <input type="file" id="uploadPhotoProfile" name="photo" hidden />
            @if ($errors->has('photo'))
            <div class="alert alert-danger">
                {{ $errors->first('photo') }}
            </div>
            @endif
            @if($user->photo)
            <div class="editPhoto">
                <label for="deletePhoto">Delete photo</label>
                <input type="checkbox" name="deletePhoto" />
            </div>
            @endif

        </div>
        <div class="w50">
            <div class="row">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" required autocomplete="name" />
                <x-input-error class="error" :messages="$errors->get('name')" />
            </div>

            <div class="row">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="error" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p>
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                    <p>
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                    @endif
                </div>
                @endif
            </div>

            <div class="row">
                <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                <x-text-input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" />
                <x-input-error class="error" :messages="$errors->updatePassword->get('current_password')" />
            </div>

            <div class="row">
                <x-input-label for="update_password_password" :value="__('New Password')" />
                <x-text-input id="update_password_password" name="password" type="password" autocomplete="new-password" />
                <x-input-error class="error" :messages="$errors->updatePassword->get('password')" />
            </div>

            <div class="row">
                <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
                <x-input-error class="error" :messages="$errors->updatePassword->get('password_confirmation')" />
            </div>

            <div>
                <button>{{ __('Save Profile') }}</button>
                @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)">
                    {{ __('Saved.') }}
                </p>
                @endif
            </div>
        </div>
    </form>
    <button id="deleteAccount" class="danger-button">{{ __('Delete Account') }}</button>
    </div>
    <div id="alertDelete" class="modal">
        <div class="modal-content">
            <h2>{{ __('Are you sure you want to delete your account?') }}</h2>
            <p>{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}</p>
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <div>
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" placeholder="{{ __('Password') }}">
                </div>
                <div>
                    <button type="button" id="cancelDelAccount">{{ __('Cancel') }}</button>
                    <button type="submit" id="deleteAcountDefinitive">{{ __('Delete Account') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection