<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

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
    protected function index()
    {
        if (Auth::check() && Auth::user()->role == 'employer') {
            $user = Auth::user()->name;
            $emprofile = DB::table('employer_profiles')
            ->where('employer_name', '=', $user)
            ->get();
            return view('dashboard.employer')->with('emprofile', $emprofile);
            // return view('dashboard.employer');
        }
        elseif (Auth::check() && Auth::user()->role == 'jobseeker') {
            return view('dashboard.jobseeker');
        }
        else {
            return view('dashboard.admin');
        }
    
        // return view('home');
    }
}
