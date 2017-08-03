@extends('layouts.app')

@section('content')
	<div class="collection">
		@foreach ($prescriptions as $prescription)
			<a href="{{ route('prescription.show', [ $prescription->id ]) }}" class="collection-item teal-text">{{ $prescription->patient->user->name }}</a>
		@endforeach
	</div>
@endsection