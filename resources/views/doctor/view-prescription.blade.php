@extends('layouts.app')

@section('content')
	<div class="center-align">
		<div class="row center-align">
			<div class="col s12">
				<h6>Doctor Name : {{ $prescription->doctor->user->name}}</h6>
				<h6>Patient Name : {{ $prescription->patient->user->name}}</h6>
			</div>
			<div class="col s12">
				<h6>Date : {{ $prescription->created_at}}</h6>
			</div>
		</div>
		<hr>
		<p>{{ $prescription->current_symptoms }}</p>
		<hr>
		<br>
	    <div class="row left-align">
	      <div class="col s12">
	        <div class="card-panel teal">
	        	<h5>Medicines</h5>
	        	<hr>
	        	<ul class="collection" style="width: 100%;">
	        		@foreach ($prescription->medicines as $medicine)
		        		<li class="collection-item teal">{{ $medicine->name }} <span class="right">{{ $medicine->at_breakfast }} + {{ $medicine->at_lunch }} + {{ $medicine->at_dinner }}</span></li>
	        		@endforeach
	        	</ul>
	        </div>
	        <a href="#modal1" class="right btn-floating btn-small waves-effect waves-light red darken-2 modal-trigger" style="position: relative;top: -40px;left:15px"><i class="material-icons">add</i></a>

<!-- Modal Trigger -->
  {{-- <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a> --}}

  <!-- Modal Structure -->
  <div id="modal1" class="modal teal">
    <div class="modal-content">
      @include('medicine.add-form', ['prescription_id' => $prescription->id])
    </div>
  </div>
	      </div>
	    </div>
		
	</div>
@endsection

@push('scripts')
	<script>
		$(document).ready(function(){
		    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
		    $('.modal').modal();
		  });
	</script>
@endpush