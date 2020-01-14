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
        $notifications = $request->user()->unreadNotifications;
        return response()->json(compact('notifications'));
    }

    public function markAsRead(Request $request)
    {
        $notification = $request->user()
            ->notifications()
            ->where('id', $request->id)
            ->first();

        if ($notification) {
            $notification->markAsRead();
        }
    }
    public function markAllRead(Request $request)
    {
        $notification = $request->user()->unreadNotifications->markAsRead();
    }
}
