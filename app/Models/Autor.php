<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'tbl_autor';
    protected $primarykey = "id";

    
    protected $fillable = ['nombre', 'ape_paterno', 'ape_materno', 'created_at', 'update_at'];

    public $timestamps = false;
}
