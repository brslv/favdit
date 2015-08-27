@extends('app')

@section('app-header')
	@include('partials._navigation_404.blade.php')
@stop

@section('app-main')
	<h2 class="page-title">Oops...</h2>
	
	<div class="alert alert-danger">Something went wrong...<a href="{{ url('/') }}">home</a> is always an option.</div>
@stop

