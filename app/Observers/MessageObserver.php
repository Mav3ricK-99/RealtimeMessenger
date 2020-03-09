<?php

namespace App\Observers;

use App\Message;
use App\Conversation;
use App\Events\MessageSent;

class MessageObserver
{
    public function created(Message $message)
    {
        $conversations = Conversation::where('user_id', $message->from)
                                    ->where('contact_id', $message->to)->first();


        if($conversations)
        {
            $conversations->last_message = "Tú: $message->message";
            $conversations->last_message_time = $message->created_at;
            $conversations->save();
        }

        $conversations = Conversation::where('contact_id', $message->from)
                                    ->where('user_id', $message->to)->first();

        if($conversations)
        {
            $conversations->last_message = "$conversations->contact_name: $message->message";
            $conversations->last_message_time = $message->created_at;
            $conversations->save();
        }

        event(new MessageSent($message));
    }


}