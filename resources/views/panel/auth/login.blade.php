@extends('layouts.master')

@section('content')
    <h3>Sign In</h3>
    <hr/>

    @include('partials.flash_notification')

    <form method="post" action="{{ route('login') }}">
    @csrf <!-- {{ csrf_field() }} -->
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="email" required="required" autofocus>
            <br>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="password" required="required" autofocus>
        </div>

        <button class="btn btn-md btn-primary" type="submit">Login</button>
    </form>
@endsection
