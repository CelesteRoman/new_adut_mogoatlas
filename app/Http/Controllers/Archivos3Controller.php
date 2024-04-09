<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Libros;
use App\Models\Articulos;
use App\Models\Guias;
use App\Models\Memorias;
use Illuminate\Support\Facades\View;
use Auth;

class Archivos3Controller extends Controller
{
    public function index(Request $request)
    {
        $data = Libros::find(1);
        $articulo = Articulos::find(1);
        $memoria = Memorias::find(1); 
        $guia = Guias::find(1);// Por ejemplo, obtén el data de la base de datos
        
        return view('leerGuia.index', compact('data','articulo','memoria','guia'));
         /*
        $searchQuery = $request->input('query');

        $datos = DB::collection('ws_archivos')
            ->where('titulo', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        return view('dashboard')->with('datos', $datos); */
      /*  
        $tipoDocumentos = TipoDocumento::all();
        $autores = Autor::all();
        $carreras = Carrera::all();
        $generos = Genero::all();
        $editorial = Editorial::all();
        return view('articulos.create')->with(compact('tipoDocumentos', 'autores', 'carreras','generos','editorial'));
    */    }
        
}