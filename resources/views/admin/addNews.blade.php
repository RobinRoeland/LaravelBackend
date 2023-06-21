@extends('layouts.master')

@section('content')

    <h2>Add new Latest News</h2>
    <br>
    <form method="POST" action="/news-add">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <input type="text" class="form-control" id="content" name="content">
        </div>

        <div class="form-group" hidden>
            <label for="publishing_date">Publishing Date:</label>
            <input type="date" class="form-control" id="publishing_date" name="publishing_date" value={{\Carbon\Carbon::now()}}>
        </div>
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>

        @include('partials.formerrors')
    </form>

@endsection