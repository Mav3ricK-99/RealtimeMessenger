<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(User_table_seeder::class);
        $this->call(Conversation_table_seeder::class);
        $this->call(Message_table_seeder::class);
    }
}
