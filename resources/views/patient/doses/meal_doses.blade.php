<div class="row">
	<div class="col s12">
		<div class="card-panel teal">
			
			<h5>Before {{ $meal }}</h5>
			<ul class="collection" style="width: 100%;">
        		@foreach ($medicines as $medicine)
        			@if ($medicine->$meal_time and !$medicine->is_after_meal)
		        		<li class="collection-item teal" style="height:40px;">
		        			<span class="left">{{ $medicine->name }} </span>
		        			<span class="right">cell # x</span>
	        			</li>
        			@endif
        		@endforeach
        	</ul>

        	<h5>After {{ $meal }}</h5>
			<ul class="collection" style="width: 100%;">
        		@foreach ($medicines as $medicine)
        			@if ($medicine->$meal_time and $medicine->is_after_meal)
		        		<li class="collection-item teal" style="height:40px;">
		        			<span class="left">{{ $medicine->name }} </span>
		        			<span class="right">cell # x</span>
	        			</li>
        			@endif
        		@endforeach
        	</ul>
		</div>
	</div>
</div>