<?php

use Illuminate\Database\Seeder;
use App\Message;

class Message_table_seeder extends Seeder
{
    public function run()
    {
        Message::create([
            
            'from' => 1,
            'to' => 2,
            'message' => 'xDDDDDDD'

        ]);
    }
}
