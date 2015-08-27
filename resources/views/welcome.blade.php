@extends('app')

@section('app-header')
    @include('partials/_navigation', ['isBack' => 'false'])

    <div class="jumbotron">
        <div class="container text-center">
            <h1 class="">A simple utility for the minimalist</h1>

            <h3 class="text-light">Collect stuff from the web. That's all.</h3>

            <p><a href="{{ url('/auth/register')  }}" class="btn btn-default btn-lg" href="#" role="button">Register</a></p>
            or <a href="{{ url('/auth/login') }}">Login</a>
        </div>
    </div>
@stop

@section('app-main')
    <section class="row">
        <section class="info-block col-sm-4">
            <h3 class="info-block-title"><span class="glyphicon glyphicon-leaf" aria-hidden="true"></span> Essentialism</h3>

            <p>The core philosophy behind <strong>Favdit</strong> app is simplicity. It's just about collecting link from the web. That's all.</p>
        </section>

        <section class="info-block col-sm-4">
            <h3 class="info-block-title"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Categories</h3>

            <p>It's everything you need to keep the things from the web that inspires you, facinates you or have some kind of value to you.</p>
        </section>

        <section class="info-block col-sm-4">
            <h3 class="info-block-title"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> Anti-social</h3>

            <p>Yeah, we've heard about facebook, twitter and the other cool-social-giants. But who the f*@# needs this, when all he wants is to save some links?</p>
        </section>
    </section>
@stop