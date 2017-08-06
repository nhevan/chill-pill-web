@extends('layouts.app')

@section('content')
	<div class="center-align">
		@include('patient.doses.meal_doses', ['meal' => 'Breakfast', 'meal_time' => 'breakfast_at', 'lowercase' => 'at_breakfast', 'medicines' => $medicines])
		@include('patient.doses.meal_doses', ['meal' => 'Lunch', 'meal_time' => 'lunch_at', 'lowercase' => 'at_lunch', 'medicines' => $medicines])
		@include('patient.doses.meal_doses', ['meal' => 'Dinner', 'meal_time' => 'dinner_at', 'lowercase' => 'at_dinner', 'medicines' => $medicines])
	</div>
@endsection