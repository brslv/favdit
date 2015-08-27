@extends('app')

@section('app-header')
    @include('partials._navigation', ['isBack' => 'true'])

@stop

@section('app-main')
    <div class="form-container">
        <h2 class="page-title">Update category {{ $category->title }}</h2>

        @include('partials._errors')

        {!! Form::model($category, ['url' => 'categories/' . $category->id]) !!}
            @include('partials.forms._category', ['submitText' => 'Update category'])
        {!! Form::close() !!}
    </div>
@stop