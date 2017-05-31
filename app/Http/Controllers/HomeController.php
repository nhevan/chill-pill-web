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

    public function viewControlls()
    {
        return view('pusher-test');
    }

    public function triggerPusher($cell_no)
    {
        $this->push('cp-sn999944', $cell_no);

        return back();
    }
}
