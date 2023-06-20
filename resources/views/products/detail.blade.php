@extends('layouts.master')

@section('content')

<div style="display: flex; flex-direction: column; background: WhiteSmoke; padding: 1%; border-radius: 30px">
    <div style="padding:5%">
        <div style="display: flex; flex-direction: row;">
            <img style="border-radius: 10%; width: 30%;" src="{{ Storage::url($product->image) }}"/>
            <div style="margin-left: 10%;">
                <table style="border-spacing: 10px; border-collapse: separate;">
                    <tr><th>naam product:</th><td>{{ $product->naam }}</td></tr>   
                    <tr><th>prijs:</th><td>{{ $product->prijs }}</td></tr>
                </table>    
            </div>
        </div>
        <div style="margin-top: 5%; background: rgb(232,232,232); padding: 1%; border-radius: 10px">
            <h4>omschrijving:</h4>
            <p>{{ $product->omschrijving }}</p>
        </div>
    </div>
        
</div>

@endsection
