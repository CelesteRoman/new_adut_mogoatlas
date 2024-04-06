<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Guias;
use App\Models\Autor;
use App\Models\TipoDocumento;
use App\Models\Carrera;
use App\Models\Genero;
use App\Models\Editorial;
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
        $generos = Genero::all();
        $editorial = Editorial::all();
        $materias = Materia::all();
        return view('guias.create')->with(compact('tipoDocumentos','autores','carreras','generos','editorial','materias'));
    }

    public function store(Request $request)
    {
        $guias = new Guias();
        $guias->Titulo= $request->Titulo;
        $guias->id_tipo_documento= (int)$request->id_tipo_documento;
        $guias->id_autor= (int)$request->id_autor;
        $guias->id_genero= (int)$request->id_genero;
        $guias->id_editorial= (int)$request->id_editorial;
        $guias->id_carrera= (int)$request->id_carrera;
        $guias->id_materia= (int)$request->id_materia;
        $guias->fecha_adquisicion= $request->fecha_adquisicion;
        $guias->anno_publicacion= $request->anno_publicacion;
        $guias->estatus= (int)$request->estatus;

        $guias->save();
    return redirect()->route('guias.index')->with('success', 'Guia creada correctamente');
      
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
        $guias->id_autor = (int)$request->id_autor;
        $guias->estatus = (int)$request->estatus;
       
        $guias->save();
        return redirect()->route('guias.index');
    }

    public function destroy(string $id)
    {
        $guias = Guias::find($id)->delete();
        return redirect()->route('guias.index');
    }
}
