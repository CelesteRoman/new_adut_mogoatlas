<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favoritos;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class FavoritosController extends Controller
{
    public function index()
    {
    
        $data = Favoritos::all();
       

        return view('favoritos.index')->with(compact('data'));
    }

}