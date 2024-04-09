<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model; SQL
use MongoDB\Laravel\Eloquent\Model; //MONGODB
class Recientes extends Model
{
    use HasFactory;

   // MongoDB -> Se comento por que voy a usar sql
   protected $connection = "mongodb";
   protected $collection = "tbl_recientes"; //este es el nombre de la base de datos en mongo
   protected $primarykey = "_id"; //el id es el de la coleccion de mongo
  
  
    public function tbl_usuarios(){
        return $this->hasOne(User::class, '_id','_id'); //id_usuario
    }

   

}
