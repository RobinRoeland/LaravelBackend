@extends('layouts.master')

@section('content')

    <h2>Log In</h2>
        
    <form method="POST" action="/logon">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required autocomplete="email">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Login</button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="passw-req">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>

        @include('partials.formerrors')
    </form>

@endsection