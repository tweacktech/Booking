<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Hash;
use Carbon\Carbon;
use Auth;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        //get 8 recent activities
        $activities = DB::table('activities')
        ->orderBy('created_at', 'desc')
        ->limit(4)
        ->get();
      
     	return view('home', compact( "activities"));
        
    }

    
}
