@extends('layout')

@section('title', 'Home')

@section('stylesheets')
@parent
@endsection
@section('content')
@include('header')
<main>
    <div class="row hybrid m0a">
        <section class="w50 row" id="title">
            <div>
                <h1>Simplify Your Life,</h1>
                <h2>Plan Your Path<br /> with PlanAhead!</h2>
                <a href="{{ route('register') }}" id="start">Start now</a>
            </div>
        </section>
        <section class="w50 row" id="imgHome">
            
                <img src="{{ asset('images/img_main.png') }}" alt="Logo from app" />
            
        </section>
    </div>
</main>
@include('footer')
@endsection