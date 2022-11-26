@extends('.layouts.master')

@section('content')
    <h3>Sign Up</h3>
    <hr/>

    @include('partials.flash_notification')

    <form method="post" action="{{ route('register') }}">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name" required="required" autofocus>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <br>
            <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="email" required="required" autofocus>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <br>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="password" required="required" autofocus>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-md btn-primary" type="submit">Register</button>
    </form>
@endsection
