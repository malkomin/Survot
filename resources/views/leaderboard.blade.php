@extends('layouts.master')

@section('title')
    Leaderboard
@endsection

@section('content')
    <table>
        <tr>
            <th>User Name</th>
            <th>Points</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td> <a href="{{route('user' , $user->id)}}"> {{$user->first_name}}</a> </td>
            <td>{{$user->points}}</td>
        </tr>
        @endforeach
    </table>
@endsection
