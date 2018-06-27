<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'adminn',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'type' => 'admin',
            'cpf' => '123456789',
            'rg' => '987654321',
            'phone' => '456789132',
        ]);
    }
}
