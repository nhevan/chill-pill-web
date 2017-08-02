@extends('layouts.app')

@section('content')
	<h3>Hello, {{ $user->name }}</h3>
	<p>doctor dashboard goes here.</p>
	@include('logout')
@endsection