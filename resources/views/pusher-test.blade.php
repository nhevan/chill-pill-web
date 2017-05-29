@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pusher test</div>

                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row text-center">
                            <div class="col-md-4">
                                <a href="/trigger-pusher/1" class="btn btn-primary">Cell 1</a>
                            </div>
                            <div class="col-md-4">
                                <a href="/trigger-pusher/2" class="btn btn-primary">Cell 2</a>
                            </div>
                            <div class="col-md-4">
                                <a href="/trigger-pusher/3" class="btn btn-primary">Cell 3</a>
                            </div>
                        </div>
                        <br>
                        <div class="row text-center">
                            <div class="col-md-4">
                                <a href="/trigger-pusher/4" class="btn btn-primary">Cell 4</a>
                            </div>
                            <div class="col-md-4">
                                <a href="/trigger-pusher/5" class="btn btn-primary">Cell 5</a>
                            </div>
                            <div class="col-md-4">
                                <a href="/trigger-pusher/6" class="btn btn-primary">Cell 6</a>
                            </div>
                        </div>
                        <br>
                        <div class="row text-center">
                            <div class="col-md-4">
                                <a href="/trigger-pusher/7" class="btn btn-primary">Cell 7</a>
                            </div>
                            <div class="col-md-4">
                                <a href="/trigger-pusher/8" class="btn btn-primary">Cell 8</a>
                            </div>
                            <div class="col-md-4">
                                <a href="/trigger-pusher/9" class="btn btn-primary">Cell 9</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
