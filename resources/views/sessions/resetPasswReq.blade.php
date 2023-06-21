@extends('layouts.master')

@section('content')

    <h2>Reset password request</h2>
        
    <form method="POST" action="/passw-req">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required autocomplete="email">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Send</button>
        </div>

        @include('partials.formerrors')
    </form>

@endsection