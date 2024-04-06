<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Libros;
use App\Models\Autor;
use App\Models\TipoDocumento;
use App\Models\Genero;
use App\Models\Editorial;
use App\Models\Carrera;

use Illuminate\Support\Facades\View;
use Auth;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $data = Libros::all();

        return view('libros.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generos = Genero::all();
        $editorial = Editorial::all();
        $carreras = Carrera::all();
        $tipoDocumento = TipoDocumento::all();
        $autores = Autor::all();
    
        return view('libros.create', compact('generos', 'editorial', 'carreras', 'tipoDocumento', 'autores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $autor = Autor::where('nombre', $request->autor_nombre)->first();

    // Verificar si se encontró el autor
    if (!$autor) {
    }

        $libro = new Libros();
        $libro->Titulo = $request->Titulo;
        $libro->id_tipo_documento = $request->id_tipo_documento;
        $libro->id_autor = $request->id_autor;
        $libro->id_genero = $request->id_genero;
        $libro->id_editorial = $request->id_editorial;
        $libro->id_carrera = $request->id_carrera;
        $libro->fecha_adquisicion = $request->fecha_adquisicion;
        $libro->anno_publicacion = $request->anno_publicacion;
        $libro->estatus = $request->estatus;
        $libro->ruta_ubicacion = $request->ruta_ubicacion;
        $libro->ruta_portada = $request->ruta_portada;
        $libro->created_at = now();
        $libro->updated_at = now();
        $libro->save();
        if($libro->save()) {
       
        return redirect()->route('libros.index');
    }}
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $libros = Libros::find($id);
        $autores = Autor::all();
        
        return view('libros.edit', compact('libros', 'autores'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, string $id)
    {
        
        $libros = Libros::find($id);
        $libros->Titulo = $request->Titulo;
        $libros->id_autor = $request->id_autor;
        $libros->estatus = $request->estatus;
       
        $libros->save();
        return redirect()->route('libros.index');
    }

    /**
     * Remove the specified resource from storage.
     */
   
        public function destroy($id)
        {
            $libro = Libros::find($id);
            if (!$libro) {
                return redirect()->route('libros.index')->with('error', 'Libro no encontrado');
            }
        
            $libro->delete();
            return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente');
        }
        
    }
