<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Articulos;
use App\Models\Autor;
use App\Models\TipoDocumento;
use App\Models\Carrera;
//use App\Models\Genero;
//use App\Models\Editorial;
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
        //$generos = Genero::all();
        //$editorial = Editorial::all();
        return view('articulos.create')->with(compact('tipoDocumentos', 'autores', 'carreras'));
    }

    public function store(Request $request)
    {
        // Validar y guardar la imagen del libro en la carpeta public/portadas/1/
if ($request->hasFile('ruta_portada')) {
    $rutaPortada = $request->file('ruta_portada')->storeAs('portadas/2', $this->limpiarNombreArchivo($request->file('ruta_portada')->getClientOriginalName()));
    // Obtener solo el nombre del archivo sin la ruta
    $nombrePortada = $this->limpiarNombrePortada($request->file('ruta_portada')->getClientOriginalName());
} else {
    $rutaPortada = null;
    $nombrePortada = null; // Si no se sube una imagen, asignar null o cualquier valor predeterminado
}

// Validar y guardar el archivo del libro en la carpeta public/archivos/1/
if ($request->hasFile('ruta_ubicacion')) {
    $rutaArchivo = $request->file('ruta_ubicacion')->storeAs('archivos/2', $this->limpiarNombreArchivo($request->file('ruta_ubicacion')->getClientOriginalName()));
    // Obtener solo el nombre del archivo sin la ruta
    $nombreArchivo = $this->limpiarNombreArchivo($request->file('ruta_ubicacion')->getClientOriginalName());
} else {
    $rutaArchivo = null; // Si no se sube un archivo, asignar null o cualquier valor predeterminado
    $nombreArchivo = null; // Si no se sube un archivo, asignar null o cualquier valor predeterminado
}

        $articulos = new Articulos();
        $articulos ->Titulo = $request->Titulo; 
        $articulos->id_tipo_documento = $request->id_tipo_documento;
        $articulos->id_autor = $request->id_autor;
        $articulos->id_carrera = $request->id_carrera;
        $articulos->fecha_adquisicion = $request->fecha_adquisicion;
        $articulos->anno_publicacion = $request->anno_publicacion;
        $articulos->estatus = $request->estatus;
        $articulos->ruta_ubicacion = $nombreArchivo;
        $articulos->ruta_portada = $nombrePortada;
        $articulos->created_at = now(); // Fecha y hora actuales
        $articulos->updated_at = now(); 
        

        $articulos->save();
        return redirect()->route('articulos.index')->with('success', 'Articulo creado correctamente');
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
        $articulos->id_autor = $request->id_autor;
        $articulos->estatus = $request->estatus;
       
        $articulos->save();
        return redirect()->route('articulos.index');
    }

    public function destroy(string $id)
    {
        $articulos = Articulos::find($id)->delete();
        return redirect()->route('articulos.index');
    }
}
