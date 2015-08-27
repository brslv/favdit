@extends('app')

@section('app-header')
	@include('partials._navigation', ['isBack' => 'true'])
@stop

@section('app-main')
	<h2 class="page-title">Aloha, {{ $user->username }}</h2>	

	<div class="alert alert-danger">
		This section is under construction. Keep calm for now. :)
	</div>
	
	<p>Username: {{ Auth::user()->username }}</p>
	<p>Email:  {{ Auth::user()->email }}</p>
	<p>Favs: {{ count(Auth::user()->favs) }}</p>
@stop