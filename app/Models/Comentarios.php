<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Comentarios extends Model
{
    use HasFactory;

    protected $connection = "mongodb";
    protected $collection = "tbl_comentarios"; 
    protected $primarykey = "_id";
    //protected  $table = 'comentarios';
    //protected $primaryKey = 'id_comentario';

    public function comentarios()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function tbl_tipo_documento(){
        return $this->hasOne(TipoDocumento::class, 'id_tipo_documento','id_tipo_documento');
    }

    public function tbl_usuarios(){
        return $this->hasOne(User::class, '_id','id_usuario');
    }


}
