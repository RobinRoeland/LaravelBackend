@extends('layouts.master')

@section('content')

    <h2>Frequently Asked Questions</h2>
    <br>
    @foreach($faqs as $faq)
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">{{ $faq->vraag }}</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Categorie: {{ $faq->categorie }}</h6>
                    <p class="card-text">{{ $faq->antwoord }}</p>
                    @if( auth()->check() && auth()->user()->isAdmin() )
                        <button class="btn btn-primary" onclick='location.href="/faq-edit/{{ $faq->id }}"' >Edit</button>
                        <button class="btn btn-primary" onclick='location.href="/faq-delete/{{ $faq->id }}"' >Delete</button>
                    @endif  
                </div>
            </div>
        </div>
    @endforeach
    @if( auth()->check() && auth()->user()->isAdmin() )
        <button class="btn btn-primary" onclick='location.href="/faq-add/"' >Add Faq</button>
    @endif  

@endsection