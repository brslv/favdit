@extends('app')

@section('app-header')
    @include('partials._navigation', ['isBack' => 'true'])

@stop

@section('app-main')
    <div class="form-container">
        <h2 class="page-title">Create new category</h2>

        @include('partials._errors')

        {!! Form::open(['url' => 'categories']) !!}
            @include('partials.forms._category', ['submitText' => 'Create category'])
        {!! Form::close() !!}
    </div>
@stop