<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Libros;
use App\Models\Autor;
use App\Models\TipoDocumento;
//use App\Models\Genero;
//use App\Models\Editorial;
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
        //$generos = Genero::all();
        //$editorial = Editorial::all();
        $carreras = Carrera::all();
        $tipoDocumento = TipoDocumento::all();
        $autores = Autor::all();
    
        return view('libros.create', compact('carreras', 'tipoDocumento', 'autores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
// Validar y guardar la imagen del libro en la carpeta public/portadas/1/
if ($request->hasFile('ruta_portada')) {
    $rutaPortada = $request->file('ruta_portada')->storeAs('portadas/1', $this->limpiarNombreArchivo($request->file('ruta_portada')->getClientOriginalName()));
    // Obtener solo el nombre del archivo sin la ruta
    $nombrePortada = $this->limpiarNombrePortada($request->file('ruta_portada')->getClientOriginalName());
} else {
    $rutaPortada = null;
    $nombrePortada = null; // Si no se sube una imagen, asignar null o cualquier valor predeterminado
}

// Validar y guardar el archivo del libro en la carpeta public/archivos/1/
if ($request->hasFile('ruta_ubicacion')) {
    $rutaArchivo = $request->file('ruta_ubicacion')->storeAs('archivos/1', $this->limpiarNombreArchivo($request->file('ruta_ubicacion')->getClientOriginalName()));
    // Obtener solo el nombre del archivo sin la ruta
    $nombreArchivo = $this->limpiarNombreArchivo($request->file('ruta_ubicacion')->getClientOriginalName());
} else {
    $rutaArchivo = null; // Si no se sube un archivo, asignar null o cualquier valor predeterminado
    $nombreArchivo = null; // Si no se sube un archivo, asignar null o cualquier valor predeterminado
}

        $autor = Autor::where('nombre', $request->autor_nombre)->first();

    // Verificar si se encontró el autor
    if (!$autor) {
    }

        $libro = new Libros();
        $libro->Titulo = $request->Titulo;
        $libro->id_tipo_documento = $request->id_tipo_documento;
        $libro->id_autor = $request->id_autor;
        //$libro->id_genero = $request->id_genero;
        //$libro->id_editorial = $request->id_editorial;
        $libro->id_carrera = $request->id_carrera;
        $libro->fecha_adquisicion = $request->fecha_adquisicion;
        $libro->anno_publicacion = $request->anno_publicacion;
        $libro->estatus = $request->estatus;
        $libro->ruta_ubicacion = $nombreArchivo;
        $libro->ruta_portada = $nombrePortada;
        $libro->created_at = now(); // Fecha y hora actuales
        $libro->updated_at = now(); 
        $libro->save();
        if($libro->save()) 
       
        return redirect()->route('libros.index');
}
   // Función para limpiar el nombre del archivo y eliminar caracteres especiales
   private function limpiarNombreArchivo($nombreArchivo)
   {
   // Reemplazar espacios y caracteres especiales con guiones bajos
   $nombreLimpio = preg_replace('/[^\w\-\.]/', '_', $nombreArchivo);
   return $nombreLimpio;
   }

   private function limpiarNombrePortada($nombrePortada)
   {
   // Reemplazar espacios y caracteres especiales con guiones bajos
   $nombreLimpio = preg_replace('/[^\w\-\.]/', '_', $nombrePortada);
   return $nombreLimpio;


    }
    

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
