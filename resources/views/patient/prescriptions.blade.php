@extends('layouts.app')

@section('content')
	<div class="center-align">
		<h3>Prescriptions</h3>
      	<div class="collection">
			@foreach ($prescriptions as $prescription)
		        <a href="{{ route('prescription.show', [$prescription->id]) }}" class="collection-item teal white-text" style="height: 40px;"> <span class="left">Prescription by {{$prescription->doctor->user->name}}</span>  <span class="right"><small>on {{ Carbon\Carbon::parse($prescription->created_at)->format('M j\' y') }}</small></span></a>
			@endforeach
	    </div>
	</div>
@endsection