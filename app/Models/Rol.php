<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model; SQL
use MongoDB\Laravel\Eloquent\Model; //MONGODB


class Rol extends Model
{
    use HasFactory;

    // MongoDB -> Se comento por que voy a usar sql
    protected $connection = "mongodb";
    protected $collection = "tbl_roles"; //este es el nombre de la base de datos en mongo
    protected $primarykey = "id_rol"; //el id es el de la coleccion de mongo



    /*
    protected  $table = 'rols';
    protected $primaryKey = 'id_rol';
    */

}
