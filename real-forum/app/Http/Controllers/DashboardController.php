<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Channel;
use App\Discusion;
use App\Reply;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels_count = Channel::count();
        $discusions_count = Discusion::count();
        $replies_count = Reply::count();

        return view('dashboard', compact('channels_count', 'discusions_count', 'replies_count'));
    }
}
