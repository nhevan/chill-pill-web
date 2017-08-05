@extends('layouts.app')

@section('content')
	<div class="center-align">
		<h4>Feedbacks </h4>
		<ul class="collapsible" data-collapsible="accordion">
			@foreach ($feedbacks as $feedback)
			    <li>
			      <div class="collapsible-header teal">
			      	<span style="width: 100%">
				      	<span class="left">{{ $feedback->patient->user->name }}</span>
				      	<span class="right"><small>posted on {{ Carbon\Carbon::parse($feedback->created_at)->format('M j\' y') }}</small></span>
			      	</span>
			      </div>
			      <div class="collapsible-body"><span>{{ $feedback->feedback }}</span></div>
			    </li>
			@endforeach
		</ul>
	</div>
@endsection

@push('scripts')
	<script>
		$(document).ready(function(){
		    $('.collapsible').collapsible();
		});
	</script>
@endpush