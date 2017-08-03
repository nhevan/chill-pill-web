@extends('layouts.app')

@section('content')
<div class="container center-align" style="padding-top:30px;">
    <div class="row">
        <h6>This activity is for demo purpose only</h6>
        <form action={{ route('setupTestPins') }} method="POST" role="form" class="text-center">
            {{csrf_field()}}
            <div class="col s12 margin-all">
                <div class="switch">
                    <label>1<input name="cell1" type="checkbox"><span class="lever"></span></label>
                    <label>2<input name="cell2" type="checkbox"><span class="lever"></span></label>
                    <label>3<input name="cell3" type="checkbox"><span class="lever"></span></label>
                </div>
            </div>
            <div class="col s12 margin-all">
                <div class="switch">
                    <label>4<input name="cell4" type="checkbox"><span class="lever"></span></label>
                    <label>5<input name="cell5" type="checkbox"><span class="lever"></span></label>
                    <label>6<input name="cell6" type="checkbox"><span class="lever"></span></label>
                </div>
            </div>
            <div class="col s12 margin-all">
                <div class="switch">
                    <label>7<input name="cell7" type="checkbox"><span class="lever"></span></label>
                    <label>8<input name="cell8" type="checkbox"><span class="lever"></span></label>
                    <label>9<input name="cell9" type="checkbox"><span class="lever"></span></label>
                </div>
            </div>
            <div class="col s6 offset-s3 margin-all">
                <label for="cron_minute" class="btn-floating btn active red darken-3"><i class="material-icons">timer</i><</label>
                <input id="cron_minute" name="cron_minute" type="text" class="mark timepicker set-trigger-minute-time-picker center-align">
            </div>
            
            <div class="col s12">
                <button type="submit" class="btn btn-primary">Test Dose Alarm</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    <script>
    $('.timepicker.set-trigger-minute-time-picker').pickatime({
        default: 'now', // Set default time: 'now', '1:30AM', '16:30'
        twelvehour: true, // Use AM/PM or 24-hour format
        donetext: 'Ok', // text for done-button
        cleartext: 'Clear', // text for clear-button
        canceltext: 'Cancel', // Text for cancel-button
        autoclose: true, // automatic close timepicker
        aftershow: function(){} //Function for after opening timepicker
      });
    </script>
@endpush
