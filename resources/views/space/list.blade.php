@extends('layout')

@section('title', 'Spaces')

@section('stylesheets')
@parent
@endsection
@include('header')
@section('content')
<section id="spaces">
    <div class="breadcrumb">
        {{ Breadcrumbs::render() }}
    </div>
    <h1>Spaces</h1>
    <div class="pagination">
        {{ $spaces->links('components/pagination') }}
    </div>

    <div class="hybrid m0a row">
        @foreach ($spaces as $space)
        <article class="w33">
            <div class="inner">
                @if ($space->wallpaper)
                <div class="slideSpace"
                    style="background-image: url('{{ asset('images/wallpapers/' . $space->wallpaper) }}')">
                    @else
                    <div class="slideSpace" style="background-image: url('{{ asset('images/wallpaperSpace2.png') }}')">
                        @endif
                        @if ($space->photo)
                        <img src="{{ asset('images/photos/' . $space->photo)}}" class="imgSpace" alt="Photo space">
                        @else
                        <img src="{{ asset('images/profileSpace.png') }}" class="imgSpace" alt="Default Photo">
                        @endif
                    </div>
                    <div class="infoSpace">
                        <h2><a href="{{ route('space', ['id' => $space->id]) }}">{{$space->name}}</a></h2>
                        <p>{{$space->description}}</p>
                        <p>{{ $space->countMembers() }} {{ $space->countMembers() === 1 ? 'member' : 'members' }}</p>
                    </div>
                </div>
        </article>
        @endforeach
    </div>
</section>
@include('footer')
@endsection