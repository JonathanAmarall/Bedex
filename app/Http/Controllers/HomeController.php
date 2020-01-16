<?php

namespace App\Http\Controllers;

use App\Proposal;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $proposalsOfTheMonth = DB::table('proposals')
                ->whereMonth('created_at', 1)
                ->count();
            return view('dashboard', compact('proposalsOfTheMonth'));
        } else {
            $currentMonth = Carbon::now()->month;
            $proposalsOfTheMonth = DB::table('proposals')
                ->where('user_id', '=', Auth::user()->id)
                ->whereMonth('created_at', "$currentMonth")
                ->count();
            return view('dashboard', compact('proposalsOfTheMonth'));
        }
    }

   
}
