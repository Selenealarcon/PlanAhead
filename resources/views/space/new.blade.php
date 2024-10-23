@extends('layout')

@section('title', 'New Space')
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="emailExists" content="{{ route('email_exists') }}">

@section('stylesheets')
@parent
@endsection
@include('header')
@push('scripts')
<script src="{{ asset('js/scripts.js') }}"></script>
@endpush
@section('content')
<section id="newSpace" class="hybrid m0a">
    <div class="breadcrumb">
        {{ Breadcrumbs::render() }}
    </div>
    <h1>New Space</h1>
    <form method="POST" action="{{ route('space_new') }}" class="row fw" enctype="multipart/form-data">
        @csrf
        <div class="w50 row divName">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" />
            @error('name')
            <span class="error">{{ $message }}</span>
            @enderror
            
        </div>
        <div class="w50 row">
            <label for="wallpaper">Space Wallpaper</label>
            <div class="wallpaper-container">
                <img class="fileUploadWallpaper" src="{{ asset('images/fileUpload.png') }}" alt="img">
                <p class="dropText">Selecciona un archivo o arrastra y suelta aquí</p>
                <input type="file" id="wallpaper" name="wallpaper" />
            </div>
        </div>

        <div class="w50 row">
            <label for="description">Description</label>
            <textarea id="description" type="text" name="description"></textarea>
            @error('description')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="w50">
            <label for="photo">Space Photo</label>
            <div class="photo-container">
                <img class="fileUploadPhoto" src="{{ asset('images/fileUpload.png') }}" alt="img">
                <p class="dropText">Selecciona un archivo o arrastra y suelta aquí</p>
                <input class="photo" type="file" id="photo" name="photo" />
            </div>
        </div>
        <div class="members row">
            <div class="w50">
                <label for="addMembers">Add Members</label>
                <div class="row">
                    <input type="email" id="addMembersInput" name="addMembersInput[]"
                        placeholder="Add members by email...">
                    <button type="button" id="addMemberBtn" onclick="checkEmailAndAddMember()">Add Member</button>
                    <ul id="memberList"></ul>
                    <input type="hidden" id="hiddenMembers" name="members[]">
                </div>
            </div>
        </div>

        <div class="buttons">
            <button type="submit" href="">Save</button>
            <a href="">Preview</a>
        </div>
    </form>
</section>
@include('footer')
@endsection