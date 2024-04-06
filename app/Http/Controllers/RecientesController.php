<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Recientes;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\View;
use Auth;

class RecientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $data = TipoDocumento::all();
       

        return view('recientes.index')->with(compact('data'));
    }

    
}
