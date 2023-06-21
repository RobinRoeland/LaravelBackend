@extends('layouts.master')

@section('content')

    <h2>Edit FAQ</h2>
    <br>
    <form method="post" action="/faq-update/" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('POST')

        <div class="form-group row">
            <label for="categorieid" class="col-sm-3 col-form-label">Categorie</label>
            <div class="col-sm-9">
                <input name="categorie" type="text" class="form-control" id="categorieid" value="{{ $faq->categorie }}"
                       required value="{{ old('categorie') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="vraagid" class="col-sm-3 col-form-label">Vraag</label>
            <div class="col-sm-9">
                <input name="vraag" type="text" class="form-control" id="vraagid" 
                       value="{{ $faq->vraag }}" required value="{{ old('vraag') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="antwoordid" class="col-sm-3 col-form-label">Antwoord</label>
            <div class="col-sm-9">
                <input name="antwoord" type="text" class="form-control" id="antwoordid" value="{{ $faq->antwoord }}"
                       required value="{{ old('antwoord') }}">
            </div>
        </div>
        <div class="form-group row" hidden>
            <label for="id" class="col-sm-3 col-form-label">FAQ Id</label>
            <div class="col-sm-9">
                <input name="id" type="number" class="form-control" id="id"
                       value="{{ $faq->id }}" required">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Update FAQ</button>
            </div>
        </div>
        @include('partials.formerrors')
    </form>

@endsection
