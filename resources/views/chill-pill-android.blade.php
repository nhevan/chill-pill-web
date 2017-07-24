@extends('layouts.fullscreen')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="content">
	            <br>
	            <br>
                <img src="images/chill-pill-logo-2.png" style="width:100px; margin: 0 auto; display: block;">
                <h5>Chill Pill</h5>
                <br>
                <br>
					      <div class="row">
							    <form class="col s12">
							    	<div class="row">
							    		<div class="switch">
										    <label>
										      Doctor
										      <input type="checkbox">
										      <span class="lever"></span>
										      Patient
										    </label>
										  </div>
							    	</div>
							      <div class="row">
							        <div class="input-field col s8 offset-s2">
							          <input placeholder="Please enter you username" id="first_name" type="text" class="validate">
							          <label for="first_name">Username</label>
							        </div>
							      </div>
							      <div class="row">
							        <div class="input-field col s8 offset-s2">
							          <input id="password" type="password" class="validate">
							          <label for="password">Password</label>
							        </div>
							      </div>
							      
										<button class="btn waves-effect waves-light" type="submit" name="action">Submit
									    <i class="material-icons right">send</i>
									  </button>

							    </form>
							  </div>
            </div>
        </div>
    </div>
</div>
@endsection
