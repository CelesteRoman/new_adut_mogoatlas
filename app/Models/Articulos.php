<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Articulos extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'tbl_articulos';
    protected $primarykey = "_id";

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'id_autor', '_id');
    }
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera','_id');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'id_tipo_documento','_id');
    }
    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero','_id');
    }

   

}
