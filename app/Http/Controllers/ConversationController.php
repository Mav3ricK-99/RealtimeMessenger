<?php

namespace App\Http\Controllers;

use App\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{

    public function index()
    {
        return Conversation::where('user_id', auth()->id())->get([
                'user_id',
                'contact_id',
                'last_message',
                'last_message_time',
                'listen_notifications',
                'blocked'
            
        ]);
    }

    public function destroy(Conversation $conversation)
    {
        //
    }
}
