@extends('layouts.fullscreen')

@section('content')
<div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="col s12">
            <h6>Hello</h6>
            <h3>{{ Auth::user()->name }}</h3>
            <span>[ Developer ]</spam>
        </div>
    </div>
    <div class="row" style="margin-top: 50px;">
        <div class="col s12">
            <a href="{{ route('testDose') }}" class="waves-effect waves-light btn pulse"><i class="material-icons right">track_changes</i>Go for a test drive</a>
        </div>
    </div>
    <div class="row" style="margin-top: 100px;">
        @include('logout')
    </div>
</div>
@endsection
