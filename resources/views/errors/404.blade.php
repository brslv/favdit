@extends('app')

@section('app-header')
	@include('partials._navigation_404')
@stop

@section('app-main')
	<h2 class="page-title">Oh, 404...</h2>
	
	<div class="alert alert-danger">It seems like the page is missing or doesn't even exist...</div>
@stop