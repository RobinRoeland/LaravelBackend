@extends('layouts.master')

@section('content')

    <h2>Add new user</h2>
    <br>
    <form method="POST" action="/user-add">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="password">Confirm Password:</label>
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember"> {{ __('Remember Me') }} </label>
            </div>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="isAdmin" id="isAdmin" {{ old('isAdmin') ? 'checked' : '' }}>
                    <label class="form-check-label" for="isAdmin"> {{ __('is admin') }} </label>
            </div>
        </div>
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>

        @include('partials.formerrors')
    </form>

@endsection