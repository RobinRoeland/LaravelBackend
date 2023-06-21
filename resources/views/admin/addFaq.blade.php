@extends('layouts.master')

@section('content')

    <h2>Add new FAQ</h2>
    <br>
    <form method="POST" action="/faq-add">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="categorie">Categorie:</label>
            <input type="text" class="form-control" id="categorie" name="categorie">
        </div>

        <div class="form-group">
            <label for="vraag">Vraag:</label>
            <input type="text" class="form-control" id="vraag" name="vraag">
        </div>

        <div class="form-group">
            <label for="antwoord">Antwoord:</label>
            <input type="text" class="form-control" id="antwoord" name="antwoord">
        </div>
 
        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>

        @include('partials.formerrors')
    </form>

@endsection