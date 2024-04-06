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

    $memorias->save();
    return redirect()->route('memorias.index')->with('success', 'Memoria creada correctamente');
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
