<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function __construch()
    {
        // $this->middleware('auth');
    }
    public function notifications(Request $request)
    {
        // $user = Auth::user();
        // $notifications = $user->notifications;
        $notifications = $request->user()->notifications;
        return response()->json(compact('notifications'));
    }
}
