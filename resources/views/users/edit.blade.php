@extends('layouts.master')

@section('content')

    <h2>Edit profile</h2>

    <form method="post" action="/profile" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('POST')

        <div class="form-group row">
            <label for="nameid" class="col-sm-3 col-form-label">Naam</label>
            <div class="col-sm-9">
                <input name="name" type="text" class="form-control" id="nameid" 
                       value="{{ $user->name }}" required value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="emailid" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input name="email" type="text" class="form-control" id="emailid" value="{{ $user->email }}"
                       required value="{{ old('email') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="biographyid" class="col-sm-3 col-form-label">Biography</label>
            <div class="col-sm-9">
                <input name="biography" type="text" class="form-control" id="biographyid" value="{{ $user->biography }}"
                       required value="{{ old('biography') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="birthdayid" class="col-sm-3 col-form-label">Geboortedatum</label>
            <div class="col-sm-9">
                <input name="birthday" type="date" class="form-control" id="birthdayid" value={{ $user->birthday }}
                       required value="{{ old('birthday') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="Avatarid" class="col-sm-3 col-form-label">Avatar</label>
            <div class="col-sm-9">
                <img src="{{$user->avatar}}">
                <input name="avatar" type="file" id="avatarid" accept=".jpg, .jpeg, .png, .gif, .bmp" class="custom-file-input">
                <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
            </div>
        </div>
        <div class="form-group row" hidden>
            <label for="userid" class="col-sm-3 col-form-label">Id</label>
            <div class="col-sm-9">
                <input name="user" type="number" class="form-control" id="userid"
                       value="{{ auth()->user()->id }}" required">
            </div>
        </div>
        <div class="form-group row" hidden>
            <label for="passwordid" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
                <input name="password" type="text" class="form-control" id="passwordid"
                       value="{{ auth()->user()->password }}" required">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </div>
        @include('partials.formerrors')
    </form>

@endsection
