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
            case 7:
                $pin_no = 7;
                break;
            case 8:
                $pin_no = 8;
                break;
        }
        $this->push('cp-sn999944', $cell_no, $pin_no);

        return back();
    }
}
