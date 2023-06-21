@extends('layouts.master')

@section('content')

    <h2>Add a product</h2>
    <br>
    <form method="post" action="/products" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="naamid" class="col-sm-3 col-form-label">Product Naam</label>
            <div class="col-sm-9">
                <input name="naam" type="text" class="form-control" id="naamid" 
                       placeholder="Product Naam" required value="{{ old('naam') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="categorieid" class="col-sm-3 col-form-label">Categorie</label>
            <div class="col-sm-9">
                <input name="categorie" type="text" class="form-control" id="categorieid"
                       placeholder="Categorie" required value="{{ old('categorie') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="omschrijvingid" class="col-sm-3 col-form-label">Omschrijving</label>
            <div class="col-sm-9">
                <input name="omschrijving" type="text" class="form-control" id="omschrijvingid"
                       placeholder="Omschrijving" required value="{{ old('omschrijving') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="productimageid" class="col-sm-3 col-form-label">Product Image</label>
            <div class="col-sm-9">
                <input name="image" type="file" id="productimageid" class="custom-file-input">
                <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
            </div>
        </div>
        <div class="form-group row">
            <label for="prijsid" class="col-sm-3 col-form-label">Prijs</label>
            <div class="col-sm-9">
                <input name="prijs" type="number" class="form-control" id="prijsid"
                       placeholder="Prijs" required value="{{ old('prijs') }}">
            </div>
        </div>
        <div class="form-group row" hidden>
            <label for="userid" class="col-sm-3 col-form-label">User</label>
            <div class="col-sm-9">
                <input name="user" type="number" class="form-control" id="userid"
                       value="{{ auth()->user()->id }}" required">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Submit Product</button>
            </div>
        </div>
        @include('partials.formerrors')
    </form>

@endsection





