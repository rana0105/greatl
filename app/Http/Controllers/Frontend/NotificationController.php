<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function unreadInfo()
    {
    	return response()
    	    ->json(
    	    	Auth::user()->unreadNotifications
    	    );
    }
}
