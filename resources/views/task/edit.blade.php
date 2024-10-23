@extends('layout')

@section('title', 'Edit task')

@section('stylesheets')
@parent
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection
@include('header')
@push('scripts')
<script src="{{ asset('js/scripts.js') }}"></script>
@endpush
@section('content')
<section id="editTask" class="hybrid m0a">
    <div class="breadcrumb">
        {{ Breadcrumbs::render('task_edit', $space, $task) }}
    </div>
    <h1>Edit task</h1>
    <div class="row">
        <div class="w20">
            <label for="taskType">Type of task</label>
            <select class="taskType" name="taskType">
                <option value="basic" {{ $task->type == 'basic' ? 'selected' : '' }}>Basic</option>
                <option value="list" {{ $task->type == 'list' ? 'selected' : '' }}>List</option>
            </select>
        </div>

        <section class="taskBasic">
            <h2>Basic</h2>
            <form method="POST" action="{{ route('task_edit', ['space_id' => $space->id, 'task_id' => $task->id]) }}"
                class="row fw" enctype="multipart/form-data"> @csrf
                <div class="w50">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" value="{{ $task->name }}" />
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
                    <textarea id="description" name="description">{{ $task->description }}</textarea>
                    @error('description')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w50">
                    <h3>Assign Task</h3>
                    <div class="members row">
                        @foreach($members as $member)
                        <input type="checkbox" name="members[]" id="members" value="{{ $member->id }}"
                            @checked($task->users()->where('users.id', $member->id)->exists())>
                        <label>{{ $member->name }}</label>
                        @endforeach
                    </div>
                </div>
                <input type="hidden" name="type" value="{{$task->type}}">
                <button type="submit">Save</button>
            </form>
        </section>
        <section class="taskList">
            <h2>List</h2>
            <form method="POST" action="{{ route('task_edit', ['space_id' => $space->id, 'task_id' => $task->id]) }}"
                class="row fw" enctype="multipart/form-data">
                @csrf
                <div class="w50">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" value="{{ $task->name }}" />
                    @error('name')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w50">
                    <label for="date">Limit date</label>
                    <input id="date" type="date" name="date" value="{{ $task->date }}" />
                </div>
                <div class="w50">
                    <label for="listItems">Items</label>
                    <ul id="listItems">
                        @foreach($items as $item)
                        <li>
                            <span>{{ $item->name }}</span>&nbsp&nbsp
                            <a href="#" class="editItem"><img style="width: 20px" src="{{ asset('images/edit.png') }}"
                                    alt="edit item" /></a>&nbsp
                            <a href="{{ route('item_delete', ['space_id' => $space->id, 'task_id' => $task->id, 'item_id' => $item->id]) }}"
                                class="deleteItem"><img style="width: 20px" src="{{ asset('images/delete.png') }}"
                                    alt="delete item" /></a>
                            <input type="hidden" name="item_{{ $item->id }}" id="item_{{ $item->id }}"
                                value="{{ $item->name }}">
                        </li>
                        @endforeach
                    </ul>
                    <div class="w50">
                        <label for="newItems">New Item</label>
                        <div id="newItems">
                            <input type="text" id="item" placeholder="Enter an item" name="items[]">
                            <button type="button" id="addItem">Add</button>
                            <ul id="itemList"></ul>
                            <input type="hidden" id="hiddenItems">
                        </div>
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
                <input type="hidden" name="type" value="{{$task->type}}">
                <button type="submit" href="">Save</button>
            </form>
        </section>
    </div>
</section>
@include('footer')
@endsection