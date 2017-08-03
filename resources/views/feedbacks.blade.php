@extends('layouts.app')

@section('content')
	<div class="center-align">
		<h4>Feedbacks </h4>
		<ul class="collapsible" data-collapsible="accordion">
			@foreach ($feedbacks as $feedback)
			    <li>
			      <div class="collapsible-header teal">{{ $feedback->patient->user->name }}</div>
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