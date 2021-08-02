<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VacinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vacinas')->insert([
            'fabricante' => 'CORONAVAC',
            'dias' => '28',
            'doses_necessarias' => '2',
            'eficacia' => '50.39',
            'estoque' => random_int(0,100),
        ]);
        DB::table('vacinas')->insert([
            'fabricante' => 'ASTRAZENECA',
            'dias' => '84',
            'doses_necessarias' => '2',
            'eficacia' => '70.42',
            'estoque' => random_int(0,100),
        ]);
        DB::table('vacinas')->insert([
            'fabricante' => 'PFIZER',
            'dias' => '84',
            'doses_necessarias' => '2',
            'eficacia' => '95',
            'estoque' => random_int(0,100),
        ]);
        DB::table('vacinas')->insert([
            'fabricante' => 'JANSSEN',
            'dias' => '',
            'doses_necessarias' => '1',
            'eficacia' => '68',
            'estoque' => random_int(0,100),
        ]);
        DB::table('vacinas')->insert([
            'fabricante' => 'SPUTNIK V',
            'dias' => '147',
            'doses_necessarias' => '2',
            'eficacia' => '94.3',
            'estoque' => random_int(0,100),
        ]);
        DB::table('vacinas')->insert([
            'fabricante' => 'COVAXIN',
            'dias' => '28',
            'doses_necessarias' => '2',
            'eficacia' => '78',
            'estoque' => random_int(0,100),
        ]);
    }
}
