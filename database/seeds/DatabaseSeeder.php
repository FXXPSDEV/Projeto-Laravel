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
        $faker = Faker\Factory::create('pt_BR');

        DB::table('users')->insert([
            'name' => 'adminn',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'type' => 'admin',
            'cpf' => '123456789',
            'rg' => '987654321',
            'phone' => '456789132',
            'adress' => 'root',
            
        ]);

        for($i = 0; $i < 30; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email, 
                'password' => bcrypt('123456'),
                'type' => 'default',
                'cpf' => $faker->cpf,
                'rg' => $faker->rg,
                'phone' => $faker->cellphoneNumber,
                'adress' => $faker->region,
                
            ]);



         }

         DB::table('courses')->insert([
            'name' => 'Análise e Desenvolvimento de Sistemas',
            'ement' => ' desenvolvimento de sistemas, desde o planejamento até os testes finais.', 
            'max_students' => '40',  
    
        ]);

        DB::table('courses')->insert([
            'name' => 'Ciência da Computação',
            'ement' => 'O curso de Ciências da Computação explora bastante a fundamentação teórica por trás da linguagem de programação e proporciona ao aluno uma visão ampla da informática no contexto empresarial.', 
            'max_students' => '40',  
    
        ]);

        DB::table('courses')->insert([
            'name' => 'Engenharia da Computação',
            'ement' => 'Um engenheiro da computação pode programar redes de computadores e todos os seus componentes, como PCs, roteadores, impressoras, etc. ', 
            'max_students' => '40',  
    
        ]);
        DB::table('courses')->insert([
            'name' => 'Engenharia de Controle e Automação',
            'ement' => 'A Engenharia de Controle e Automação atua nas atividades produtivas da indústria.', 
            'max_students' => '40',  
    
        ]);
        DB::table('courses')->insert([
            'name' => 'Engenharia de Software',
            'ement' => 'Ela se ocupa da especificação, desenvolvimento e manutenção de programas, sejam eles para computadores pessoais, dispositivos móveis ou servidores..', 
            'max_students' => '40',  
    
        ]);
        DB::table('courses')->insert([
            'name' => 'Jogos Digitais',
            'ement' => 'Ele pode se envolver na criação do roteiro do jogo, na definição das regras, das condições necessárias para avançar nas fases, os cenários, personagens, animações e muito mais.', 
            'max_students' => '40',  
    
        ]);
        DB::table('courses')->insert([
            'name' => 'Sistemas de Informação',
            'ement' => 'Sistemas de Informação é administrar o fluxo de tudo o que circula pela rede de computadores de uma empresa', 
            'max_students' => '40',  
    
        ]);
        DB::table('courses')->insert([
            'name' => 'Sistemas para Internet',
            'ement' => 'Aprende a planejar, desenvolver e gerenciar diversos programas, aplicativos e interfaces para páginas na web.', 
            'max_students' => '40',  
    
        ]);




        }
}