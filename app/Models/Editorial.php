<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Editorial extends Model
{
    use HasFactory;
    
    protected $connection = 'mongodb';
    protected $collection = 'tbl_editorial';
    protected $primarykey = "id";
}
