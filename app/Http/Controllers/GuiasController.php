<?php

namespace App\Http\Controllers;
//use Symfony\Component\HttpKernel\Exception\HttpException;


use Illuminate\Http\Request;
use App\Models\Guias;
use App\Models\Autor;
use App\Models\TipoDocumento;
use App\Models\Carrera;
//use App\Models\Genero;
//use App\Models\Editorial;
use App\Models\Materia;
use Illuminate\Support\Facades\View;
use Auth;

class GuiasController extends Controller
{

    public function index()
    {
    $data = Guias::all();
    return view('guias.index')->with(compact('data'));
    }


    public function create()
    {
        //$data = Guias::all();
        $tipoDocumentos = TipoDocumento::all();
        $autores = Autor::all();
        $carreras = Carrera::all();
       // $generos = Genero::all();
        //$editorial = Editorial::all();
        $materias = Materia::all();
        return view('guias.create')->with(compact('tipoDocumentos','autores','carreras','materias'));
    }

    public function store(Request $request)
    {


// Validar y guardar la imagen del libro en la carpeta public/portadas/1/
if ($request->hasFile('ruta_portada')) {
    $rutaPortada = $request->file('ruta_portada')->storeAs('portadas/3', $this->limpiarNombreArchivo($request->file('ruta_portada')->getClientOriginalName()));
    // Obtener solo el nombre del archivo sin la ruta
    $nombrePortada = $this->limpiarNombrePortada($request->file('ruta_portada')->getClientOriginalName());
} else {
    $rutaPortada = null;
    $nombrePortada = null; // Si no se sube una imagen, asignar null o cualquier valor predeterminado
}

// Validar y guardar el archivo del libro en la carpeta public/archivos/1/
if ($request->hasFile('ruta_ubicacion')) {
    $rutaArchivo = $request->file('ruta_ubicacion')->storeAs('archivos/3', $this->limpiarNombreArchivo($request->file('ruta_ubicacion')->getClientOriginalName()));
    // Obtener solo el nombre del archivo sin la ruta
    $nombreArchivo = $this->limpiarNombreArchivo($request->file('ruta_ubicacion')->getClientOriginalName());
} else {
    $rutaArchivo = null; // Si no se sube un archivo, asignar null o cualquier valor predeterminado
    $nombreArchivo = null; // Si no se sube un archivo, asignar null o cualquier valor predeterminado
}

        $guias = new Guias();
        $guias->Titulo= $request->Titulo;
        $guias->id_tipo_documento= $request->id_tipo_documento;
        $guias->id_autor= $request->id_autor;
        //$guias->id_genero= $request->id_genero;
        //$guias->id_editorial= $request->id_editorial;
        $guias->id_carrera= $request->id_carrera;
        $guias->id_materia= $request->id_materia;
        $guias->fecha_adquisicion= $request->fecha_adquisicion;
        $guias->anno_publicacion= $request->anno_publicacion;
        $guias->estatus= $request->estatus;
        $guias->ruta_ubicacion = $nombreArchivo;
        $guias->ruta_portada = $nombrePortada;
        $guias->created_at = now(); // Fecha y hora actuales
        $guias->updated_at = now(); // Fecha y hora actuales
        $guias->save();
    return redirect()->route('guias.index');
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
        $guias = Guias::find($id);
        $autores = Autor::all();
        $materia = Materia::all();
        return view('guias.edit')->with(compact('guias','autores','materia'));
      
    }

    
    public function update(Request $request, string $id)
    {
        $guias = Guias::find($id);
        $guias->Titulo = $request->Titulo;
        $guias->id_autor = $request->id_autor;
        $guias->estatus = $request->estatus;
       
        $guias->save();
        return redirect()->route('guias.index');
    }

    public function destroy(string $id)
    {
        $guias = Guias::find($id)->delete();
        return redirect()->route('guias.index');
    }
}
