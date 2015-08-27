@extends('app')

@section('app-header')
    @include('partials._navigation', ['isBack' => 'true'])
@stop

@section('app-main')
    <div class="form-container">
        <h2 class="page-title">Add new fav</h2>

        @include('partials._errors')

        {!! Form::open(['url' => 'favs']) !!}
            @include('partials.forms._favs', ['submitText' => 'Add new fav'])
        {!! Form::close() !!}
    </div>
@stop