<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable; // ->SE COMENTO PORQUE ES DE SQL para mongodb
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Auth\User as Authenticatable; //MongoDB

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        'name',
        'ape_paterno',
        'ape_materno',
        'genderId',
        'id_rol',
        'id_carrera',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    // MongoDB -> Se comento por que voy a usar sql
    protected $connection = "mongodb";
    protected $collection = "tbl_usuarios"; //este es el nombre de la base de datos en mongo
    protected $primarykey = "_id"; //el id es el de la coleccion de mongo
    
    
  /*  public function gender(){
        //Primero es el que se una con la relacion y el segundo es el de la base de datos en mongo
        return $this->hasOne(Gender::class, 'genderId','genderId');
    }*/

    public function carrera(){
        return $this->hasOne(Carrera::class, 'id_carrera','id_carrera');
    }

    public function rol(){
        return $this->hasOne(Rol::class, 'id_rol','id_rol');
    }
    
}
