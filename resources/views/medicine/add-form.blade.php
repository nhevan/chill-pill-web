<form class="col s12" role="form" method="POST" action="{{ route('medicine.add', [ $prescription_id ]) }}" style="margin-bottom: 10px;">
	{{ csrf_field() }}
	<div class="row">
		<div class="input-field col s12">
			<input id="name" type="text" class="materialize-textarea validate white-text" name="name" value="{{ old('name') }}" required>
			<label class="white-text" for="name">Medicine Name</label>
		</div>
		
		<div class="col s12">
          Duration:
          <div class="input-field inline">
            <input id="duration" type="number" class="validate" name="duration" value="1">
            <label for="duration" class="white-text">days</label>
          </div>
        </div>

        <div class="switch">
		    <label>
		      <span class="white-text">Before Meal</span>
		      <input type="checkbox" name="is_after_meal">
		      <span class="lever background-color"></span>
		      <span class="white-text">After Meal</span>
		    </label>
		  </div>

		<p>
	      <input type="checkbox" name="at_breakfast" id="at_breakfast" />
	      <label class="white-text" for="at_breakfast">At Breakfast</label>
	    </p>

	    <p>
	      <input type="checkbox" name="at_lunch" id="at_lunch" />
	      <label class="white-text" for="at_lunch">At Lunch</label>
	    </p>

	    <p>
	      <input type="checkbox" name="at_dinner" id="at_dinner" />
	      <label class="white-text" for="at_dinner">At Dinner</label>
	    </p>

	</div>
	
	<div class="row center-align">
		<div class="col s6">
			<a href="#!" class="modal-action modal-close waves-effect btn red darken-2">Cancel</a>
		</div>
		<div class="col s6">
			<button class="btn waves-effect waves-light" type="submit" name="action">Add
			<i class="material-icons right">navigate_next</i>
			</button>
		</div>
	</div>
</form>

