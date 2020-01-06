<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre' => Str::random(10),
            'apellido_materno' => Str::random(10),
            'apellido_paterno' => Str::random(10),
            'correo' => Str::random(10).'@email.com',
            'password' => bcrypt('password'),
            'id_empresa' => 1
        ]);
    }
}
