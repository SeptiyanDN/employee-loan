<?php

namespace App\Helpers;

use App\Notifications\LaravelTelegramNotification;

class NotificationHelpers {
    public static function sendNotification($data,$message) {
        $notify = "**Kaser Notify**\n\n" . auth()->user()->name . " " . $message;
    if (auth()->user()->telegram_chat_id != null) {

        $data->notify(new LaravelTelegramNotification($notify));
    }
    }
}
