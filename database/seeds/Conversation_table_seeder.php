<?php

use Illuminate\Database\Seeder;
use App\Conversation;

class Conversation_table_seeder extends Seeder
{
    public function run()
    {
        Conversation::create([

            'user_id' => 1,
            'contact_id' => 2,
            'last_message' => null,
            'last_message_time' => null

        ]);

        Conversation::create([

            'user_id' => 1,
            'contact_id' => 3,
            'last_message' => null,
            'last_message_time' => null

        ]);

        Conversation::create([

            'user_id' => 2,
            'contact_id' => 1,
            'last_message' => null,
            'last_message_time' => null

        ]);

        Conversation::create([

            'user_id' => 3,
            'contact_id' => 1,
            'last_message' => null,
            'last_message_time' => null

        ]);
    }
}
