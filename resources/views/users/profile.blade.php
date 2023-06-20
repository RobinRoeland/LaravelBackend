@extends('layouts.master')

@section('content')

    <div style="display: flex; flex-direction: column; background: WhiteSmoke; padding: 1%; border-radius: 30px">
        <div style="display: flex; flex-direction: row">
            <h1>Profile</h1>
            <div style="width: 80%"></div>
            <button class="btn btn-primary" onclick='location.href="/edit-profile/"' >Edit profile</button>
        </div>
        <div style="padding:5%">
            <div style="display: flex; flex-direction: row;">
                <img style="border-radius: 10%;" src="{{ $user->avatar }}"/>
                <div style="margin-left: 10%;">
                    <table style="border-spacing: 10px; border-collapse: separate;">
                        <tr><th>username:</th><td> {{ $user->name }} </td></tr>   
                        <tr><th>email:</th><td> {{ $user->email }} </td></tr>   
                        <tr><th>birthday:</th><td> {{ $user->birthday }} </td></tr>
                        
                    </table>    
                </div>
            </div>
            <div style="margin-top: 5%; background: rgb(232,232,232); padding: 1%; border-radius: 10px">
                <h3>Description</h3>
                <p> {{ $user->biography }} </p>
            </div>
        </div>
    </div>

@endsection