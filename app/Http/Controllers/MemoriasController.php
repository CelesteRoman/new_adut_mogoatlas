<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Memorias;
use App\Models\TipoDocumento;
use App\Models\Autor;
use App\Models\Carrera;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Auth;

class MemoriasController extends Controller
{
    
    public function index()
    {
    $data = Memorias::all();
     return view('memorias.index')->with(compact('data'));
    }

    public function create()
    {
        $tipoDocumentos = TipoDocumento::all();
        $autores = Autor::all();
        $carreras = Carrera::all();
        //$id_tutor = User::all();
        $maestros = User::where('id_rol', 2)->get();

        
        return view('memorias.create', compact('tipoDocumentos', 'autores', 'carreras','maestros'));
    }

    public function store(Request $request)
    {

        // Validar y guardar la imagen del libro en la carpeta public/portadas/1/
if ($request->hasFile('ruta_portada')) {
    $rutaPortada = $request->file('ruta_portada')->storeAs('portadas/4', $this->limpiarNombreArchivo($request->file('ruta_portada')->getClientOriginalName()));
    // Obtener solo el nombre del archivo sin la ruta
    $nombrePortada = $this->limpiarNombrePortada($request->file('ruta_portada')->getClientOriginalName());
} else {
    $rutaPortada = null;
    $nombrePortada = null; // Si no se sube una imagen, asignar null o cualquier valor predeterminado
}

// Validar y guardar el archivo del libro en la carpeta public/archivos/1/
if ($request->hasFile('ruta_ubicacion')) {
    $rutaArchivo = $request->file('ruta_ubicacion')->storeAs('archivos/4', $this->limpiarNombreArchivo($request->file('ruta_ubicacion')->getClientOriginalName()));
    // Obtener solo el nombre del archivo sin la ruta
    $nombreArchivo = $this->limpiarNombreArchivo($request->file('ruta_ubicacion')->getClientOriginalName());
} else {
    $rutaArchivo = null; // Si no se sube un archivo, asignar null o cualquier valor predeterminado
    $nombreArchivo = null; // Si no se sube un archivo, asignar null o cualquier valor predeterminado
}
    $memorias = new Memorias();
    $memorias->Titulo = $request->Titulo;
    $memorias->id_tipo_documento = $request->id_tipo_documento;
    $memorias->id_autor = $request->id_autor;
    $memorias->id_carrera = $request->id_carrera;
    $memorias->id_tutor = $request->id_tutor;
    $memorias->empresa = $request->empresa;
    $memorias->fecha_adquisicion = $request->fecha_adquisicion;
    $memorias->anno_publicacion = $request->anno_publicacion;
    $memorias->estatus = $request->estatus;
    $memorias->ruta_ubicacion = $nombreArchivo;
    $memorias->ruta_portada = $nombrePortada;
    $memorias->created_at = now(); // Fecha y hora actuales
    $memorias->updated_at = now(); 

    $memorias->save();
    return redirect()->route('memorias.index')->with('success', 'Memoria creada correctamente');
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
        $memorias = Memorias::find($id);
        $tutor = $memorias->tutor;
    
        return view('memorias.show', compact('memoria', 'tutor'));
    }

    public function edit(string $id)
    {
        $memoria = Memorias::find($id);
        $autores = Autor::all();
       

        return view('memorias.edit', compact('memoria', 'autores'));
    }

    public function update(Request $request, string $id)
    {
        $memoria = Memorias::find($id);
        $memoria->Titulo = $request->Titulo;
        $memoria->id_autor = $request->id_autor;
        $memoria->empresa = $request->empresa;
        $memoria->fecha_adquisicion = $request->fecha_adquisicion;
        $memoria->anno_publicacion = $request->anno_publicacion;
        $memoria->estatus = $request->estatus;

       

        $memoria->save();

        return redirect()->route('memorias.index');
    }

    public function destroy($id)
    {
        $memorias = Memorias::find($id);
        if (!$memorias) {
            return redirect()->route('memorias.index')->with('error', 'Memoria no encontrada');
        }
    
        $memorias->delete();
        return redirect()->route('memorias.index')->with('success', 'Memoria eliminada correctamente');
    }
    
}
