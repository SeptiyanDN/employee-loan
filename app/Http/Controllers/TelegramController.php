<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use pschocke\TelegramLoginWidget\Facades\TelegramLoginWidget;

class TelegramController extends Controller
{
    public function callback(Request $request){
        if(! $telegramUser = TelegramLoginWidget::validate($request)){
            return 'Telegram Response not Valid!';
        }
        $telegramChatID = $telegramUser->get('id');
        DB::table('users')
        ->where('id',auth()->user()->id)
        ->update(['telegram_chat_id' => $telegramChatID]);
        return redirect('/');
    }
}
