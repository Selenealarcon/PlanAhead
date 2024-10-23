@extends('layout')

@section('title', 'Edit space')
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
<section id="editSpace" class="hybrid m0a">
    <div class="breadcrumb">
        {{ Breadcrumbs::render('space_edit', $space) }}
    </div>
    <h1>Edit Space</h1>
    <form method="POST" action="{{ route('space_edit', ['id' => $space->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="sw row">
            <div class="members row">
                <label for="addMembers">Add Members</label>
                <div class="row">
                    <input type="email" id="addMembersInput" name="addMembersInput[]"
                        placeholder="Add members by email...">
                    <button type="button" id="addMemberBtn" onclick="checkEmailAndAddMember()">Add Member</button>
                    <ul id="memberList"></ul>
                    <input type="hidden" id="hiddenMembers" name="members[]">
                </div>
                <ul id="memberList"></ul>
                <div id="members">
                    <h3>Members</h3>
                    <table>
                        @foreach($members as $member)
                        <tr>
                            <td>
                                @if ($member->photo)
                                <img src="{{ asset('images/users/' . $member->photo) }}" alt="photo profile" />
                                @else
                                <img src="{{ asset('images/profileSpace.png') }}" alt="Default Photo">
                                @endif
                            </td>
                            <td>{{$member->email}}</td>
                            <td><img class="btnEditSpace" src="{{ asset('images/edit.png') }}" alt="edit member" /></td>
                            <td><a href="#"
                                    onclick="memberConfirmDelete('{{ route('delete_member', ['spaceId' => $space->id, 'memberId' => $member->id]) }}')"
                                    class="btnDeleteSpace"><img src="{{ asset('images/delete.png') }}"
                                        alt="delete member" /></a></td>

                        </tr>
                        <tr class="editMemberRow">
                            <td colspan="4" class="type">
                                <label for="typeMember">Type of member</label>
                                <br />
                                <select name="admin_status_{{ $member->id }}">
                                    <option value="0" {{ $member->pivot->administrator == 0 ? 'selected' : '' }}>Basic
                                    </option>
                                    <option value="1" {{ $member->pivot->administrator == 1 ? 'selected' : ''
                                        }}>Administrator</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <article>
                <div class="inner">
                    @if ($space->wallpaper)
                    <div class="slideSpace" id="editWallpaperSpace"
                        style="background-image: url('{{ asset('images/wallpapers/' . $space->wallpaper) }}');">
                        @else
                        <div class="slideSpace" id="editWallpaperSpace"
                            style="background-image: url('{{ asset('images/wallpaperSpace2.png') }}')">
                            @endif
                            <div class="imgSpace" id="editPhotoSpace">
                                @if ($space->photo)
                                <img src="{{ asset('images/photos/' . $space->photo)}}" class="imgSpace"
                                    alt="Photo space">
                                @else
                                <img src="{{ asset('images/profileSpace.png') }}" class="imgSpace" alt="Default Photo">
                                @endif
                                <input type="file" id="uploadPhoto" name="photo" hidden />
                            </div>
                            <input type="file" id="uploadWallpaper" name="wallpaper" hidden />
                        </div>
                        <div class="infoSpace row">
                            <input id="name" type="text" name="name" value="{{ $space->name }}" />
                            {{-- @error('name')
                            <span class="error">{{ $message }}</span>
                            @enderror --}}
                            <textarea name="description" rows="5">{{ $space->description }}</textarea>
                            {{-- @error('description')
                            <span class="error">{{ $message }}</span>
                            @enderror --}}
                        </div>
                    </div>
                    @if($space->photo)
                    <div class="editPhoto">
                        <label for="deletePhoto">Delete photo</label>
                        <input type="checkbox" name="deletePhoto" />
                    </div>
                    <div class="editPhoto">
                        <label for="uploadPhoto">Add a photo</label>
                        <input type="file" id="uploadPhoto" name="photo" />
                    </div>
                    @else
                    <div class="editPhoto">
                        <label for="uploadPhoto">Add a photo</label>
                        <input type="file" id="uploadPhoto" name="photo" />
                    </div>
                    @endif
                    <br>
                    @if($space->wallpaper)
                    <div class="editWallpaper">
                        <label for="deleteWallpaper">Delete wallpaper</label>
                        <input type="checkbox" name="deleteWallpaper" />
                    </div>
                    <div class="editWallpaper">
                        <label for="uploadWallpaper">Add a wallpaper: </label>
                        <input type="file" id="uploadWallpaper" name="wallpaper" />
                    </div>
                    @else
                    <div class="editWallpaper">
                        <label for="uploadWallpaper">Add a wallpaper: </label>
                        <input type="file" id="uploadWallpaper" name="wallpaper" />
                    </div>
                    @endif

                    @if ($errors->any())
            <div class="error"> 
                @foreach ($errors->all() as $error) 
                    <span>{{ $error }}</span><br>
                @endforeach 
            </div>
            @endif
            </article>
        </div>
        <div id="buttonContainer">
            <a href="#" onclick="spaceConfirmDelete('{{ route('space_delete', ['id' => $space->id]) }}')">Delete</a>
            <button type="submit">Edit</button>
        </div>
    </form>
</section>
@include('footer')
@endsection