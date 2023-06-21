@extends('layouts.master')

@section('content')

    <h2>Reset password</h2>
        
    <form method="POST" action="/passw-reset">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value={{$email}} required value="{{ old('email') }}>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
        </div>

        <div class="form-group">
            <label for="password">Confirm Password:</label>
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>

        @include('partials.formerrors')
    </form>

@endsection