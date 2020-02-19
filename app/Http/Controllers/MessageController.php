<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use DB;

class MessageController extends Controller
{

    public function index(Request $request)
    {
        $userID = auth()->id();
        $contactID = $request->contact;

        return Message::select(
            'message_id',
            DB::raw("IF(`from` = $userID, TRUE, FALSE) as written_by_me"),
            'message',
            'created_at',
            'updated_at',
        )
        ->where(function ($query) use ($userID, $contactID)
        {
            $query->where('from', $userID)->where('to', $contactID);
        })
        ->orWhere(function ($query) use ($userID, $contactID)
        {
            $query->where('from', $contactID)->where('to', $userID);
        })
        ->get();


    }

    public function store(Request $request)
    {
        $message = New Message();
        $message->from = auth()->id();
        $message->to = $request->to;
        $message->message = $request->message;
        $saved = $message->save();

        $data = [];
        $data['success'] = $saved;
        return $data;
    }

    public function destroy(Message $message)
    {
        //
    }
}
