<?php

namespace App\Http\Controllers;

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
}
