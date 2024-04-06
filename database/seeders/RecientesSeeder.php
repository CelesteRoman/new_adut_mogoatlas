<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recientes;

use Illuminate\Support\Facades\DB;

class RecientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

DB::table('vs_recientes')->insert([
    
    'fecha' => '2023-11-27',
    'created_at' => DB::raw('now()'),
]);
/*
DB::table('tbl_recientes')->insert([
    'id_reciente' => '19', 
    'id_documento' => '1',
    'fecha' => '2023-11-27',
    'created_at' => DB::raw('now()'),
]);

DB::table('tbl_recientes')->insert([
    'id_reciente' => '20', 
    'id_documento' => '1',
    'fecha' => '2023-11-27',
    'created_at' => DB::raw('now()'),
]);

DB::table('tbl_recientes')->insert([
    'id_reciente' => '133', 
    'id_documento' => '1',
    'fecha' => '2023-12-05',
    'created_at' => DB::raw('now()'),
]); */
    }
}
