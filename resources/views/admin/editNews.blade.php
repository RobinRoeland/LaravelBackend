@extends('layouts.master')

@section('content')

    <h2>Edit Latest News</h2>
    <br>
    <form method="post" action="/news-update/" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('POST')

        <div class="form-group row">
            <label for="titleid" class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-9">
                <input name="title" type="text" class="form-control" id="titleid" value="{{ $news->title }}"
                       required value="{{ old('title') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="contentid" class="col-sm-3 col-form-label">Content</label>
            <div class="col-sm-9">
                <input name="content" type="text" class="form-control" id="contentid" 
                       value="{{ $news->content }}" required value="{{ old('content') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="publishingdateid" class="col-sm-3 col-form-label">Publishing Date</label>
            <div class="col-sm-9">
                <input name="publishing_date" type="date" class="form-control" id="publishingdateid" value="{{ $news->publishing_date }}"
                       required value="{{ old('publishing_date') }}">
            </div>
        </div>
        <div class="form-group row" hidden>
            <label for="imageid" class="col-sm-3 col-form-label">Cover Image</label>
            <div class="col-sm-9">
                <input name="image" type="file" id="imageid" class="custom-file-input"> value={{ $news->image }}
                <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
            </div>
        </div>
        <div class="form-group row" hidden>
            <label for="id" class="col-sm-3 col-form-label">News Id</label>
            <div class="col-sm-9">
                <input name="id" type="number" class="form-control" id="id"
                       value="{{ $news->id }}" required">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Update News</button>
            </div>
        </div>
        @include('partials.formerrors')
    </form>

@endsection
