@extends('layouts.fullscreen')

@section('content')
	<div class="container full-height valign-wrapper">
		<div class="row">
			<div class="col s12">
				<h3>Countdown timer</h3>
				<p> Alarm set for {{ $target_time }} </p>
				<span id="timer"></span>
			</div>
			<div class="col s12">
				<a href="{{ route('testDose') }}" class="btn-floating btn-large waves-effect waves-light secondary-color"><i class="material-icons">arrow_back</i></a>
			</div>
		</div>
	</div>


@endsection

@push('scripts')
	<script>
		var count= {{ $differenceInSeconds }};

        var counter=setInterval(timer, 1000); //1000 will  run it every 1 second

        function timer()
        {
          count=count-1;
          if (count <= 0)
          {
             clearInterval(counter);
             document.getElementById("timer").innerHTML="<p class='red'>Alarm will buzz any second now ...</p>"; 
             return;
          }

         document.getElementById("timer").innerHTML="<span class='secondary-color'>" + count + " secs</span> remaining ..."; 
        }
	</script>
@endpush