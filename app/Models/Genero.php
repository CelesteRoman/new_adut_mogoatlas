<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'tbl_genero';
    protected $primarykey = "id";

}
