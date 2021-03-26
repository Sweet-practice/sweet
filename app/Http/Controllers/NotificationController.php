<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Notification;

class NotificationController extends Controller
{
	public function index()
	{
		$count = Notification::aggregate(Auth::user()->id);
		$notifications = Notification::where('user_id', Auth::user()->id)->get();
		return view('user/notification.index', ['notifications' => $notifications, 'count' => $count]);
	}

	public function show($id)
	{
		$count = Notification::aggregate(Auth::user()->id);
		$notification = Notification::find($id);
		if($notification->status == 'Unread'){
			$notification->status = 'Read';
			$notification->save();
		}
		return view('user/notification.show', ['notification' => $notification, 'count' => $count]);
	}
}
