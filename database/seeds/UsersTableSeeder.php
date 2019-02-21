<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'email' => 'admin@host.ru',
            'password' => bcrypt('123456')
        ]);
    }
}
