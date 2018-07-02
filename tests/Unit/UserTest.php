<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    public function test_create_user(){
        \App\User::create([
            'name'=> 'Teste',
            'email'=>'teste@teste.com',
            'password'=> bcrypt('123456'),
            'type' => 'admin',
            'cpf' => '123486789',
            'rg' => '987614321',
            'phone' => '456789132',
            'adress' => 'root',
        ]);

        $this->assertTrue(true, 'This should already work.');
    }
}
