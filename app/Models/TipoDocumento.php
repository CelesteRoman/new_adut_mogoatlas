<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

    protected  $table = 'tbl_tipo_documento';

    protected $primaryKey = 'id_tipo_documento';
}
