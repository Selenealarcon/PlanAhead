@extends('layout')

@section('title', 'Space')

@section('stylesheets')
@parent
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection
@include('header')
@push('scripts')
<script src="{{ asset('js/scripts.js') }}"></script>
@endpush
@section('content')
<div class="banner row sw">
    <h1>{{ $space->name }}</h1>
    <div class="row">
        <div class="image-row">
            @php $count = 0; @endphp
            @foreach($members as $member)
            @if ($count < 3) @if ($member->photo)
                <img src="{{ asset('images/users/' . $member->photo) }}" class="imgProfile" alt="photo profile" />
                @else
                <img src="{{ asset('images/profileSpace.png') }}" class="imgProfile" alt="Default Photo">
                @endif
                @endif
                @php $count++; @endphp
                @endforeach
                @if ($count > 3)
                <img src="{{ asset('images/plusSign.png') }}" class="imgProfile" alt="Plus sign">
                @endif
        </div>

        @if ($space->users()->where('space_user.user_id', Auth::user()->id)->where('space_user.administrator',
        1)->exists())
        <a href="{{ route('space_edit', ['id' => $space->id]) }}">
            <img src="{{ asset('images/settings.png') }}" alt="Photo of settings" />
        </a>
        @endif

    </div>
</div>

<div class="breadcrumb">
    {{ Breadcrumbs::render('space', $space) }}
</div>

<div id="spaceMenu" class="row sw hybrid m0a">
    <input type="text" id="searchInput" placeholder="Search tasks...">
    <div class="buttons">
        <a href="{{ route('task_new', ['id' => $space->id]) }}">New task</a>
        <button id="filterBtn">Filter</button>
    </div>
</div>

<section id="tasks" class="hybrid m0a">
    <table>
        <thead>
            <tr id="table-header">
                <th></th>
                <th>Name</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Assignees</th>
                <th></th>

            </tr>
        </thead>
        <tbody id="table-body">
            @if(!is_null($tasks))
            @foreach ($tasks as $task)
            <tr>
                <td class="showDetails">
                    <x-forkawesome-eye class="eyeOpened" />
                    <x-ri-eye-close-line class="eyeClosed" />
                </td>
                <td>{{ $task->name }}</td>
                <td>
                    @if ($task->date)
                    {{ date('d F Y', strtotime($task->date)) }}
                    @else
                    -
                    @endif
                </td>
                <td>
                    <form method="POST" id="formStatus" action="{{ route('task_edit', ['space_id' => $space->id, 'task_id' => $task->id]) }}" class="row fw" enctype="multipart/form-data"> @csrf
                        <select class="taskStatus" name="status">
                            <option value="To be done" {{ $task->status == "To be done" ? 'selected' : '' }}>To do</option>
                            <option value="Not done" {{ $task->status == "Not done" ? 'selected' : '' }}>Not done</option>
                            <option value="completed" {{ $task->status == "completed" ? 'selected' : '' }}>Completed</option>
                        </select>
                    </form>
                </td>
                <td class="image-row">
                    @php $count = 0; @endphp
                    @foreach($task->users as $user)
                    @if ($count < 3) @if ($user->photo)
                        <img src="{{ asset('images/users/' . $user->photo) }}" class="imgProfile" alt="photo profile" />
                        @else
                        <img src="{{ asset('images/profileSpace.png') }}" class="imgProfile" alt="Default Photo">
                        @endif
                        @php $count++; @endphp
                        @endif
                        @endforeach
                        @if ($count > 3)
                        <img src="{{ asset('images/plusSign.png') }}" class="imgProfile" alt="Plus sign">
                        @endif
                </td>
                <td><a href="{{ route('task_edit', ['space_id' => $space->id, 'task_id' => $task->id]) }}"><img style="width: 20px" src="{{ asset('images/edit.png') }}" alt="edit task" /></a></td>
                @if(Auth::user()->id == $space->user_id)
                <td><a href="#" onclick="taskConfirmDelete('{{ route('task_delete', ['space_id' => $space->id, 'task_id' => $task->id]) }}')"><img style="width: 20px" src="{{ asset('images/delete.png') }}" alt="delete task" /></a></td>
                @endif
            </tr>
            <tr class="taskDescription">
                <td></td>
                <td colspan="4">
                    <h3>Description</h3>{{ $task->description }}
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <div id="menuFilters">
        <form id="filterForm" method="POST" action="{{ route('task_filter', ['spaceId' => $space->id]) }}">
            @csrf
            <div id="divStatus">
                <h3>Status</h3>
                <div id="listStatus">
                    <label>
                        <input type="checkbox" name="ftrStatus[]" value="Done">
                        Done
                    </label>
                    <label>
                        <input type="checkbox" name="ftrStatus[]" value="To be done">
                        To do
                    </label>
                    <label>
                        <input type="checkbox" name="ftrStatus[]" value="Not done">
                        Not done
                    </label>
                </div>
            </div>
            <div id="divStatus">
                <h3>Members</h3>
                <div id="listStatus">
                    @if (!empty($members))
                    @foreach($members as $member)
                    <label>
                        <input type="checkbox" name="ftrMember[]" value="{{ $member->id }}">
                        {{ $member->name }}
                    </label>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="row">
                <a href="{{ route('space', ['id' => $space->id]) }}">Delete filters</a>
                <button type="submit">Apply filters</button>
            </div>
        </form>
    </div>
</section>
@include('footer')
@endsection