@extends('layouts.master')

@section('content')

    <h2>Users administration</h2>
    <br>
    <table id="list" style="background:rgb(240,240,240); border-radius:10px; width:95%;">
        <tr style="background:lightgray;">
            <th style="padding: 2%; border-radius: 10px 0 0 0;">Name</th>
            <th style="padding: 2%;">email</th>
            <th style="padding: 2%;"># products</th>
            <th style="padding: 2%; border-radius: 0 10px 0 0">Admin</th>
            <th style="padding: 2%; border-radius: 0 10px 0 0">Delete</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td style="padding: 2%;">{{ $user->name }}</td>
                <td style="padding: 2%;">{{ $user->email }}</td>
                <td style="padding: 2%;">{{ $user->products()->count() }}</td>
                <td style="padding: 2%;"><a href="/user-admin/{{ $user->id }}">{{ $user->isAdmin() ? 'YES' : 'NO' }}</a></td>
                <td style="padding: 2%;"><a href="/user-delete/{{ $user->id }}">Delete</a></td>
            </tr>
        @endforeach
    </table>
    <br>
    <button class="btn btn-primary" onclick='location.href="/user-add/"' >Add user</button>
@endsection