<?php

namespace App\Http\Controllers\Module;

use Illuminate\Http\Request;

class Notification
{
    //remove notification
    public static function remove($notificationId)
    {
        \App\Models\Notification::where('id', $notificationId)->delete();
    }

    //add new notification
    public static function add($userId, $text, $actionUrl)
    {
        \App\Models\Notification::create([
            'user_id'       => $userId,
            'text'          => $text,
            'action_url'    => $actionUrl,
        ]);
    }
}
