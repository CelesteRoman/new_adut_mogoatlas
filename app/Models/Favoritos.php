<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model; 
use App\Models\Favoritos;

class Favoritos extends Model
{
    use HasFactory;
    protected $connection = "mongodb";
    protected $collection = "tbl_favoritos"; 
    protected $primarykey = "_id";
   // protected  $table = 'tbl_favoritos';
   //protected $primaryKey = 'id_favorito';

    public function tbl_usuarios(){
        return $this->belongsTo(User::class, '_id','_id');
    }

    public function tbl_tipo_documento(){
        return $this->belongsTo(TipoDocumento::class, 'id_tipo_documento','id_tipo_documento');
    }
}
