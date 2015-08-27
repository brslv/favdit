@extends('app')

@section('app-header')
	@include('partials._navigation', ['isBack' => 'true'])
@stop

@section('app-main')
	@include('partials._flash')

	@if (isset($favs))
		
		<h2 class="page-title">Manage favs</h2>
		
		@include('partials.manage._favs')
		
	@elseif (isset($categories))
		
		<h2 class="page-title">Manage categories</h2>
		
		@include('partials.manage._categories')
		
	@endif
@stop