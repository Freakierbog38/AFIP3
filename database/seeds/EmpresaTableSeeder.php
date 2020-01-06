<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        'nombre' => Str::random(10),
        'RFC' => Str::random(10),
        'telefono' => '1234567890',
        'direccion' => Str::random(20),
        'giro' => 'giro de la empresa'
    }
}
