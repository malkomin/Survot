@extends('layouts.master')

@section('title')
    Login
@endsection

@section('content')
    <div class="col-md-6">
        <h3>Sign In</h3>
        <form action="{{ route('loginControl') }}" method="post">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Your E-Mail</label>
                <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Your Password</label>
                <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
@endsection
