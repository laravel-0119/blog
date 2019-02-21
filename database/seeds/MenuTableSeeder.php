<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu')->delete();
        
        \DB::table('menu')->insert(array (
            0 => 
            array (
                'caption' => 'Главная',
                'created_at' => NULL,
                'id' => 1,
                'link' => '/',
                'parent_id' => NULL,
                'route' => 'site.main.index',
                'updated_at' => NULL,
                'weight' => 98,
            ),
            1 => 
            array (
                'caption' => 'Обо мне',
                'created_at' => NULL,
                'id' => 2,
                'link' => '/about.html',
                'parent_id' => NULL,
                'route' => 'aboutPage',
                'updated_at' => NULL,
                'weight' => 99,
            ),
            2 => 
            array (
                'caption' => 'Авторизация',
                'created_at' => NULL,
                'id' => 3,
                'link' => '#',
                'parent_id' => NULL,
                'route' => NULL,
                'updated_at' => NULL,
                'weight' => 100,
            ),
            3 => 
            array (
                'caption' => 'Регистрация',
                'created_at' => NULL,
                'id' => 4,
                'link' => '/register.html',
                'parent_id' => 3,
                'route' => NULL,
                'updated_at' => NULL,
                'weight' => 100,
            ),
            4 => 
            array (
                'caption' => 'Вход',
                'created_at' => NULL,
                'id' => 5,
                'link' => '/login.html',
                'parent_id' => 3,
                'route' => NULL,
                'updated_at' => NULL,
                'weight' => 100,
            ),
            5 => 
            array (
                'caption' => 'Обратная связь',
                'created_at' => NULL,
                'id' => 6,
                'link' => '/feedback.html',
                'parent_id' => NULL,
                'route' => 'feedbackPage',
                'updated_at' => NULL,
                'weight' => 101,
            ),
        ));
        
        
    }
}