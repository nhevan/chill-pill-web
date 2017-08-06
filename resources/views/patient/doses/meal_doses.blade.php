<div class="row">
	<div class="col s12">
		<div class="card-panel teal">
			
			<h5>Before {{ $meal }}</h5>
			<h6>{{ Carbon\Carbon::parse($patient->$meal_time)->subMinutes(30)->format('h:i a') }}</h6>
			<ul class="collection" style="width: 100%;">
        		@foreach ($medicines as $medicine)
        			@if ($medicine->$lowercase and !$medicine->is_after_meal)
		        		<li class="collection-item teal" style="height:40px;">
		        			<span class="left">{{ $medicine->name }} </span>
		        			<span class="right">
		        				@if ($medicine->cell_number)
		        					cell # {{$medicine->cell_number}}
		        				@else
		        					unassigned
		        				@endif
		        			</span>
	        			</li>
        			@endif
        		@endforeach
        	</ul>

        	<h5>After {{ $meal }}</h5>
        	<h6>{{ Carbon\Carbon::parse($patient->$meal_time)->addMinutes(30)->format('h:i a') }}</h6>
			<ul class="collection" style="width: 100%;">
        		@foreach ($medicines as $medicine)
        			@if ($medicine->$lowercase and $medicine->is_after_meal)
		        		<li class="collection-item teal" style="height:40px;">
		        			<span class="left">{{ $medicine->name }} </span>
		        			<span class="right">
								@if ($medicine->cell_number)
		        					cell # {{$medicine->cell_number}}
		        				@else
		        					unassigned
		        				@endif
		        			</span>
	        			</li>
        			@endif
        		@endforeach
        	</ul>
		</div>
	</div>
</div>