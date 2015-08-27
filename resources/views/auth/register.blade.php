@extends('app')

@section('app-header')
    @include('partials/_navigation', ['isBack' => 'false'])
@stop

@section('app-main')
    <div class="form-container">
        <h2 class="page-title">Register</h2>

        @include('partials/_errors')

        <form method="POST" action="/auth/register">
            {!! csrf_field() !!}

            <div class="form-group">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username">
            </div>

            <div class="form-group">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default">Register me</button>
            </div>
        </form>
    </div>
@stop