<?php

use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([
            'nome' => 'Eduardo Henrique',
            'cpf' => '12345678911',
            'idade' => '24',
            'telefone' => '54999999999',
        ]);
        DB::table('pacientes')->insert([
            'nome' => 'Paula Maria',
            'cpf' => '12345678912',
            'idade' => '47',
            'telefone' => '54999999999',
        ]);
        DB::table('pacientes')->insert([
            'nome' => 'Tiago Emanuel',
            'cpf' => '12345678913',
            'idade' => '45',
            'telefone' => '55999999999',
        ]);
        DB::table('pacientes')->insert([
            'nome' => 'Carlos Alberto',
            'cpf' => '12345678921',
            'idade' => '32',
            'telefone' => '45999999999',
        ]);
        DB::table('pacientes')->insert([
            'nome' => 'Mario Avante',
            'cpf' => '12345678922',
            'idade' => '54',
            'telefone' => '55999999999',
        ]);
        DB::table('pacientes')->insert([
            'nome' => 'Jeovana Duarte',
            'cpf' => '12345678923',
            'idade' => '24',
            'telefone' => '54999999999',
        ]);
        DB::table('pacientes')->insert([
            'nome' => 'Ana Beatriz',
            'cpf' => '12345678931',
            'idade' => '30',
            'telefone' => '54999999999',
        ]);
        DB::table('pacientes')->insert([
            'nome' => 'Clara Maria',
            'cpf' => '12345678932',
            'idade' => '19',
            'telefone' => '54999999999',
        ]);
        DB::table('pacientes')->insert([
            'nome' => 'Maria Cristina',
            'cpf' => '12345678933',
            'idade' => '19',
            'telefone' => '54999999999',
        ]);
    }
}
