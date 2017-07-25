@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dose Test</div>

                <div class="panel-body">
                    <div class="container-fluid">
                        <form action={{ route('setupTestPins') }} method="POST" role="form" class="text-center">
                            {{csrf_field()}}
                            <div class="form-group text-center">
                                <label class="checkbox-inline"><input name="cell1" type="checkbox">Cell 1</label>
                                <label class="checkbox-inline"><input name="cell2" type="checkbox">Cell 2</label>
                                <label class="checkbox-inline"><input name="cell3" type="checkbox">Cell 3</label>
                            </div>
                            <div class="form-group text-center">
                                <label class="checkbox-inline"><input name="cell4" type="checkbox">Cell 4</label>
                                <label class="checkbox-inline"><input name="cell5" type="checkbox">Cell 5</label>
                                <label class="checkbox-inline"><input name="cell6" type="checkbox">Cell 6</label>
                            </div>
                            <div class="form-group text-center">
                                <label class="checkbox-inline"><input name="cell7" type="checkbox">Cell 7</label>
                                <label class="checkbox-inline"><input name="cell8" type="checkbox">Cell 8</label>
                                <label class="checkbox-inline"><input name="cell9" type="checkbox">Cell 9</label>
                            </div>
                            <div class="form-group text-center">
                                <label>Set trigger minute:</label>  
                                <select class="form-control" id="cron_minute" name="cron_minute" style="width:30%; margin:0 auto;">
                                    @for ($i = 1; $i < 60; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Test Dose Alarm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
