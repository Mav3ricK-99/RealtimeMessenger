<?php

use Illuminate\Database\Seeder;
use App\User;

class User_table_seeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Fd',
            'email' => 'federico_99@live.com.ar',
            'password' => bcrypt('federico')
        ]);

        User::create([
            'name' => 'Mav3rick',
            'email' => 'federieeco_99@live.com.ar',
            'password' => bcrypt('federico')
        ]);

        User::create([
            'name' => 'XDDDDDDDD',
            'email' => 'fede22rieeco_99@live.com.ar',
            'password' => bcrypt('federico')
        ]);
    }
}
