@extends('layouts.app')

@section('content')
	<div class="center-align">
		@include('patient.doses.meal_doses', ['meal' => 'Breakfast', 'meal_time' => 'at_breakfast', 'medicines' => $medicines])
		@include('patient.doses.meal_doses', ['meal' => 'Lunch', 'meal_time' => 'at_lunch', 'medicines' => $medicines])
		@include('patient.doses.meal_doses', ['meal' => 'Dinner', 'meal_time' => 'at_dinner', 'medicines' => $medicines])
	</div>
@endsection