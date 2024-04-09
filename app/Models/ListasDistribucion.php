<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model; SQL
use MongoDB\Laravel\Eloquent\Model; //MONGODB

class ListasDistribucion extends Model
{
    use HasFactory;

     // MongoDB -> Se comento por que voy a usar sql
     protected $connection = "mongodb";
     protected $collection = "tbl_listas_distribucion"; //este es el nombre de la base de datos en mongo
     protected $primarykey = "_id"; //el id es el de la coleccion de mongo

   // protected  $table = 'tbl_listas_distribucion';
   // protected $primaryKey = 'id_lista';

    public function tbl_usuarios(){
        return $this->hasOne(User::class, 'id_usuario','id_usuario');
    }
}
