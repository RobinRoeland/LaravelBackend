@extends('layouts.master')

@section('content')
    <table id="list" style="background:rgb(240,240,240); border-radius:10px; width:95%;">
        <tr style="background:lightgray;">
            <th style="padding: 2%; border-radius: 10px 0 0 0;">Naam</th>
            <th style="padding: 2%;">Categorie</th>
            <th style="padding: 2%;">Omschrijving</th>
            <th style="padding: 2%;">Prijs</th>
            <th style="padding: 2%; border-radius: 0 10px 0 0">Details</th>
            <th style="padding: 2%; border-radius: 0 10px 0 0">Edit</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td style="padding: 2%;">{{ $product->naam }}</td>
                <td style="padding: 2%;">{{ $product->categorie }}</td>
                <td style="padding: 2%;">{{ $product->omschrijving }}</td>
                <td style="padding: 2%;">{{ $product->prijs }}</td>
                <td style="padding: 2%;"><a href="/products/{{ $product->id }}">detail</a></td>
                <td style="padding: 2%;"><a href="/products/edit/{{ $product->id }}">edit</a></td>
            </tr>
        @endforeach
    </table>

@endsection