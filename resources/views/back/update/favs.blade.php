@extends('app')

@section('app-header')
    @include('partials._navigation', ['isBack' => 'true'])

@stop

@section('app-main')
    <div class="form-container">
        <h2 class="page-title">Update fav {{ $fav->title }}</h2>

        @include('partials._errors')

        {!! Form::model($fav, ['url' => 'favs/' . $fav->id, 'method' => 'put']) !!}
        	@include('partials.forms._favs', ['submitText' => 'Update fav'])
        {!! Form::close() !!}
    </div>
@stop