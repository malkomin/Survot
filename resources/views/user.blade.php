@extends('layouts.master')

@section('title')
    User - {{ $user->first_name }}
@endsection

@section('content')
    <section class="row">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Account</h3></header>
            <div>
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
            </div>
            <div>
                <label>Points : {{ $user->points }}</label>
            </div>
        </div>
    </section>
@endsection
