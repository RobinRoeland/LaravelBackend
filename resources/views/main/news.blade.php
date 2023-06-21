@extends('layouts.master')

@section('content')

    <h2>Latest News</h2>
    <br>
    @foreach($news as $n)
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">{{ $n->title }}</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Published {{ $n->publishing_date }}</h6>
                    <p class="card-text">{{ $n->content }}</p>
                    @if( auth()->check() && auth()->user()->isAdmin() )
                        <button class="btn btn-primary" onclick='location.href="/news-edit/{{ $n->id }}"' >Edit</button>
                        <button class="btn btn-primary" onclick='location.href="/news-delete/{{ $n->id }}"' >Delete</button>
                    @endif  
                </div>
            </div>
        </div>
    @endforeach
    @if( auth()->check() && auth()->user()->isAdmin() )
        <button class="btn btn-primary" onclick='location.href="/news-add/"' >Add News</button>
    @endif  

@endsection