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
        DB::table('users')->insert([
            'nome' => 'Rubens',
            'email' => 'rubensjovinaldo@gmail.com',
            'qtdPokedex' => '75',
            'password' => bcrypt('111'),
        ]);
        DB::table('users')->insert([
            'nome' => 'Pedro',
            'email' => 'b@gmail.com',
            'qtdPokedex' => '27',
            'password' => bcrypt('222'),
        ]);
        DB::table('users')->insert([
            'nome' => 'Dayane',
            'email' => 'c@gmail.com',
            'qtdPokedex' => '100',
            'password' => bcrypt('333'),
        ]);
        DB::table('users')->insert([
            'nome' => 'Bruno',
            'email' => 'd@gmail.com',
            'qtdPokedex' => '99',
            'password' => bcrypt('444'),
        ]);
        DB::table('users')->insert([
            'nome' => 'Julio',
            'email' => 'e@gmail.com',
            'qtdPokedex' => '75',
            'password' => bcrypt('555'),
        ]);
    }
}
