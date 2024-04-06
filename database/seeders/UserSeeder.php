<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Para la materia - 1
       DB::table('tbl_usuarios')->insert([
        '_id' => 9, 
        'name' => 'Alumno1',
        'ape_paterno' => 'xxxxx',
        'ape_materno' => 'xxxxx',
        'id_rol'=> 1,
        'email'=> 'alumno@utchetumal.edu.mx',
        'password'=> bcrypt('123456789'),
        'id_carrera'=> 1,
        'estatus' =>1,
        'ruta_perfil'=>'perfil4',
        'created_at' => DB::raw('now()')
        
    ]);
    }
}
