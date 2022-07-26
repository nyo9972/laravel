<?php

namespace App\Http\Controllers\Module;

use Illuminate\Http\Request;

class Notification
{

    public static function remove($notificationId)
    {
        \App\Models\Notification::where('id', $notificationId)->delete();
    }

}
