<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'tbl_materia';
    protected $primarykey = "id";

}

