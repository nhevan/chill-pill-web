@extends('layouts.fullscreen')
@section('content')
<div class="container valign-wrapper" style="height: 100vh">
	<div class="row fix-valign" style="width: 100%;">
		<div class="col s12">
			<ul class="collapsible popout signup" data-collapsible="accordion">
				<li class="" style="border-bottom:10px solid #242b2e">
					<div class="collapsible-header secondary-color-full"><i class="fa fa-heart background-color-text" aria-hidden="true"></i><p class="no-margin no-padding background-color-text">I am a Patient</p></div>
					<div class="collapsible-body">
						@include('auth.patient-sign-up')
					</div>
				</li>
				<li>
					<div class="collapsible-header secondary-color-full"><i class="fa fa-stethoscope background-color-text" aria-hidden="true"></i><p class="no-margin no-padding background-color-text">I am a Doctor</p></div>
					<div class="collapsible-body">
						@include('auth.doctor-sign-up')
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection
@push('script')
<script>
	$(document).ready(function(){
		$('.collapsible.signup').collapsible();
	});
</script>
@endpush