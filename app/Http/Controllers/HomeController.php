<?php

namespace App\Http\Controllers;

use App\TestPin;
use Illuminate\Http\Request;

class HomeController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function viewControls()
    {
        return view('pusher-test');
    }

    public function triggerPusher($cell_no)
    {
        $pin_no = 0;
        switch ($cell_no) {
            case 1:
                $pin_no = 32;
                break;
            case 2:
                $pin_no = 22;
                break;
            case 3:
                $pin_no = 15;
                break;
            case 4:
                $pin_no = 13;
                break;
            case 5:
                $pin_no = 11;
                break;
            case 6:
                $pin_no = 18;
                break;
            case 7:
                $pin_no = 7;
                break;
            case 8:
                $pin_no = 8;
                break;
            case 9:
                $pin_no = 16;
                break;
        }
        $this->pushToPin('cp-sn999944', $cell_no, $pin_no);

        return back();
    }

    public function testDose()
    {
        return view('test-dose-alarm');
    }

    public function setupTestPins(Request $request)
    {
        $this->setNodeSchedule($request['cron_minute']. " * * * *");
        $this->setTemporaryCellValues($request);

        return back();
    }

    public function setTemporaryCellValues(Request $request)
    {
        $tmp_pins = TestPin::find(1);
        $this->clearPreviousPinStates($tmp_pins);

        if (isset($request['cell1'])) {
            $tmp_pins->pin1 = true;
        }
        if (isset($request['cell2'])) {
            $tmp_pins->pin2 = true;
        }
        if (isset($request['cell3'])) {
            $tmp_pins->pin3 = true;
        }
        if (isset($request['cell4'])) {
            $tmp_pins->pin4 = true;
        }
        if (isset($request['cell5'])) {
            $tmp_pins->pin5 = true;
        }
        if (isset($request['cell6'])) {
            $tmp_pins->pin6 = true;
        }
        if (isset($request['cell7'])) {
            $tmp_pins->pin7 = true;
        }
        if (isset($request['cell8'])) {
            $tmp_pins->pin8 = true;
        }
        if (isset($request['cell9'])) {
            $tmp_pins->pin9 = true;
        }

        $tmp_pins->save();
    }

    public function clearPreviousPinStates(TestPin $tmp_pins)
    {
        $tmp_pins->pin1 = false;
        $tmp_pins->pin2 = false;
        $tmp_pins->pin3 = false;
        $tmp_pins->pin4 = false;
        $tmp_pins->pin5 = false;
        $tmp_pins->pin6 = false;
        $tmp_pins->pin7 = false;
        $tmp_pins->pin8 = false;
        $tmp_pins->pin9 = false;

        $tmp_pins->save();
    }

    public function setNodeSchedule($cron_formatted_time)
    {
        $data['type'] = 'sync';
        $data['cron_formatted_schedule'] = $cron_formatted_time;

        $this->push('my-channel', 'my-event', $data);
    }
}
