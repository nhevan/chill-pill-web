@extends('layouts.app')

@section('content')
	<div class="center-align">
		<p>{{ $prescription->current_symptoms }}</p>
		<hr>
		<br>
		{{-- <div class="row left-align">
	      <div class="col s12">
	        <div class="card-panel teal">
	        	<h5>Conditions</h5>
	        	<hr>
	        	<ul>
	        		<li>- jhg </li>
	        	</ul>
	        </div>
	        <a class="right btn-floating btn-small waves-effect waves-light red darken-2" style="position: relative;top: -40px;left:15px"><i class="material-icons">add</i></a>
	      </div>
	    </div> --}}

	    <div class="row left-align">
	      <div class="col s12">
	        <div class="card-panel teal">
	        	<h5>Medicines</h5>
	        	<hr>
	        	<ul class="collection" style="width: 100%;">
	        		<li class="collection-item teal">Napa Extra <span class="right">0 + 0 + 1</span></li>
	        		<li class="collection-item teal">Napa Extra <span class="right">0 + 0 + 1</span></li>
	        		<li class="collection-item teal">Napa Extra <span class="right">0 + 0 + 1</span></li>
	        		<li class="collection-item teal">Napa Extra <span class="right">0 + 0 + 1</span></li>
	        	</ul>
	        </div>
	        <a class="right btn-floating btn-small waves-effect waves-light red darken-2" style="position: relative;top: -40px;left:15px"><i class="material-icons">add</i></a>
	      </div>
	    </div>
		
	</div>
@endsection