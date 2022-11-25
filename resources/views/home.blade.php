@extends('layouts.master')

@section('content')
    <h3>Home</h3>
    @if(!\Auth::guest())
        <div>Welcome, {{ \Auth::user()->name }}</div>
    @else
        <div>Welcome!</div>
    @endif
@endsection
