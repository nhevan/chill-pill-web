@extends('layouts.fullscreen')

@section('content')
	<h3>Hello, {{ $user->name }}</h3>
	<p>patient dashboard goes here.</p>
	@include('logout')
@endsection