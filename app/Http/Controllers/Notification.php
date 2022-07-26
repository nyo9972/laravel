<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Notification extends Controller
{
    public function viewNotification(Request $request){
        \App\Http\Controllers\Module\Notification::remove($request->notificationId);
    }
}
