<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model; SQL
use MongoDB\Laravel\Eloquent\Model; //MONGODB

class Carrera extends Model
{
    use HasFactory;

  
    // MongoDB -> Se comento por que voy a usar sql
    protected $connection = "mongodb";
    protected $collection = "tbl_carreras"; //este es el nombre de la base de datos en mongo
    protected $primarykey = "id_carrera"; //el id es el de la coleccion de mongo



}
