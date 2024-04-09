<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comentarios;
use App\Models\User;
use App\Models\Libros;
use App\Models\Memorias;
use App\Models\Articulos;
use App\Models\Guias;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\ListasDistribucion;
use App\Models\TipoDocumento;
class ListaDistribucionController extends Controller
{
    public function index()
    {
        //$data = Auth::user();
        $data = User::all();
        $data = ListasDistribucion::all();
        

        return view('listaDistribucion.index')->with(compact('data'));

        // Accedemos a los comentarios del usuario
       // $comentarios = $data->comentarios;
    }

    public function create()
    {
        //$data = Guias::all();
        //$data = ListasDistribucion::all();
        $libros = Libros::all();
        $memoria = Memorias::all();
        $articulo = Articulos::all();
        $guias = Guias::all();
        $tipoDocumentos = TipoDocumento::all();
       
        return view('listaDistribucion.create')->with(compact('tipoDocumentos','libros','memoria','articulo','guias'));
    }

    public function store(Request $request)
    {
        $listaDistribucion = new ListasDistribucion();
        $listaDistribucion->id_usuario = Auth::id();
        $listaDistribucion->detalle = $request->detalle;
        $listaDistribucion->nombre_lista = $request->nombre_lista;
        $listaDistribucion->cantidad_archivos= (int)$request->cantidad_archivos;
      
       
        
        $listaDistribucion->save();
    return redirect()->route('listaDistribucion.index');
      
    }

    public function edit(string $id)
    {
        
        $listaDistribucion = ListasDistribucion::find($id);
      
        
        return view('listaDistribucion.edit', compact('listaDistribucion'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, string $id)
    {
        
        $listaDistribucion = ListasDistribucion::find($id);
        $listaDistribucion->id_usuario = $request->id_usuario;
        $listaDistribucion->detalle = $request->detalle;
        $listaDistribucion->nombre_lista = $request->nombre_lista;
        $listaDistribucion->cantidad_archivos= (int)$request->cantidad_archivos;
        ; 
       
        $listaDistribucion->save();
        return redirect()->route('listaDistribucion.index');
    }

    public function destroy(string $id)
    {
        $listaDistribucion = ListasDistribucion::find($id)->delete();
        return redirect()->route('listaDistribucion.index');
    }
}
