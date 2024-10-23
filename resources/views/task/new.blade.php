@extends('layout')

@section('title', 'New task')

@section('stylesheets')
@parent
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection
@include('header')
@push('scripts')
<script src="{{ asset('js/scripts.js') }}"></script>
@endpush
@section('content')
<section id="newTask" class="hybrid m0a">
    <div class="breadcrumb">
        {{ Breadcrumbs::render('task_new', $space) }}
    </div>
    <h1>New task</h1>
    <div class="row">
        <div class="w20">
            <label for="task">Type of task</label>
            <select class="taskType" name="task">
                <option value="0">Select Type</option>
                <option value="basic">Basic</option>
                <option value="list">List</option>
            </select>
        </div>
        <section class="taskBasic" @if(old('type') == 'basic') style="display:block;" @else style="display:none;" @endif>
            <h2>Basic</h2>
            <form method="POST" action="{{ route('task_new', ['id' => $space->id]) }}" class="row fw"
                enctype="multipart/form-data">
                @csrf
                <div class="w50">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" />
                    @error('name')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w50">
                    <label for="date">Limit date</label>
                    <input id="date" type="date" name="date" value="{{ date_create()->format('Y-m-d') }}" />
                </div>
                <div class="w50">
                    <label for="description">Description</label>
                    <textarea id="description" name="description"></textarea>
                    @error('description')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w50">
                    <h3>Assign Task</h3>
                    <div class="members">
                        @foreach($members as $member)
                        <input type="checkbox" name="members[]" id="members" value="{{ $member->id }}">
                        <label>{{ $member->name }}</label>
                        @endforeach
                    </div>
                </div>
                <input type="hidden" name="type" value="basic">
                <button type="submit">Save</button>
            </form>
        </section>
        <section class="taskList" @if(old('type') == 'list') style="display:block;" @else style="display:none;" @endif>
            <h2>List</h2>
            <form method="POST" action="{{ route('task_new', ['id' => $space->id]) }}" class="row fw"
                enctype="multipart/form-data">
                @csrf
                <div class="w50">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" />
                    @error('name')
            <span class="error">{{ $message }}</span>
            @enderror
                </div>
                <div class="w50">
                    <label for="date">Limit date</label>
                    <input id="date" type="date" name="date" value="{{ date_create()->format('Y-m-d') }}" />
                </div>

                <div class="w50">
                    <label for="listItems">Items</label>
                    <div id="listItems">
                        <input type="text" id="item" placeholder="Enter an item" name="items[]">
                        <button type="button" id="addItem">Add</button>
                        <ul id="itemList"></ul>
                        <input type="hidden" id="hiddenItems">
                    </div>
                </div>

                <div class="w50">
                    <h3>Assign Task</h3>
                    <div class="members">
                        @foreach($members as $member)
                        <input type="checkbox" name="members[]" id="members" value="{{ $member->id }}">
                        <label>{{ $member->name }}</label>
                        @endforeach
                    </div>
                </div>
                <input type="hidden" name="type" value="list">
                <button type="submit" href="">Save</button>
            </form>
        </section>
    </div>
</section>
@include('footer')
@endsection