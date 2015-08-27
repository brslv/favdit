@extends('app')

@section('app-header')
    @include('partials/_navigation', ['isBack' => 'false'])
@stop

@section('app-main')
    <div class="form-container">
        <h2 class="page-title">Log in</h2>

        @include('partials/_errors')

        <form method="POST" action="/auth/login">
            {!! csrf_field() !!}

            <div class="form-group">
                <input type="text" class="form-control" name="email" value="{{ old('username') }}" placeholder="Email">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <div class="form-group">
                <input type="checkbox" name="remember"> Remember Me
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default">Log me in</button>
            </div>
        </form>
    </div>
@stop