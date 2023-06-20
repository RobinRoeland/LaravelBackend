@extends('layouts.master')

@section('content')

    <h2>Frequently Asked Questions</h2>

    @foreach($faqs as $faq)
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-block">
                    <h3 class="card-title">{{ $faq->vraag }}</h3>
                    <p class="card-text">{{ $faq->antwoord }}</p>
                </div>
            </div>
        </div>
    @endforeach


@endsection