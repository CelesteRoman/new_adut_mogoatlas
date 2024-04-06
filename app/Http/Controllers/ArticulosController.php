<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Articulos;
use App\Models\Autor;
use App\Models\TipoDocumento;
use App\Models\Carrera;
use App\Models\Genero;
use App\Models\Editorial;
use Illuminate\Support\Facades\View;
use Auth;

class ArticulosController extends Controller
{
    public function index()
    {
    $data = Articulos::all();
    return view('articulos.index')->with(compact('data'));
    }

    public function create()
    {
        $tipoDocumentos = TipoDocumento::all();
        $autores = Autor::all();
        $carreras = Carrera::all();
        $generos = Genero::all();
        $editorial = Editorial::all();
        return view('articulos.create')->with(compact('tipoDocumentos', 'autores', 'carreras','generos','editorial'));
    }

    public function store(Request $request)
    {
        $articulos = new Articulos();
        $articulos ->Titulo = $request->Titulo; 
        $articulos->id_tipo_documento = (int)$request->id_tipo_documento;
        $articulos->id_autor = (int)$request->id_autor;
        $articulos->id_carrera = (int)$request->id_carrera;
        $articulos->fecha_adquisicion = $request->fecha_adquisicion;
        $articulos->anno_publicacion = $request->anno_publicacion;
        $articulos->estatus = (int)$request->estatus;

        $articulos->save();
        return redirect()->route('articulos.index')->with('success', 'Articulo creado correctamente');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $articulos = Articulos::find($id);
        $autores = Autor::all();
        
        return view('articulos.edit', compact('articulos', 'autores'));
    }

    
    public function update(Request $request, string $id)
    {
        $articulos = Articulos::find($id);
        $articulos->Titulo = $request->Titulo;
        $articulos->id_autor = (int)$request->id_autor;
        $articulos->estatus = (int)$request->estatus;
       
        $articulos->save();
        return redirect()->route('articulos.index');
    }

    public function destroy(string $id)
    {
        $articulos = Articulos::find($id)->delete();
        return redirect()->route('articulos.index');
    }
}
