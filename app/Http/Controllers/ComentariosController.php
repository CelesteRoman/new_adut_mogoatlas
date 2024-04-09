<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentarios;
use App\Models\User;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Comment;

class ComentariosController extends Controller
{
    public function index()
    {
        //$data = Auth::user();
        $data = User::all();
        $data = Comentarios::all();
        

        return view('comentarios.index')->with(compact('data'));

        // Accedemos a los comentarios del usuario
       // $comentarios = $data->comentarios;
    }

    public function create()
    {
        //$data = Guias::all();
        //$data = Comentarios::all();
        $tipoDocumentos = TipoDocumento::all();
       
        return view('comentarios.create')->with(compact('tipoDocumentos'));
    }

    public function store(Request $request)
    {
        $comentarios = new Comentarios();
        $comentarios->id_usuario = Auth::id();
        $comentarios->id_documento= (int)$request->id_documento;
        $comentarios->comentario = $request->comentario;
        $comentarios->id_tipo_documento= (int)$request->id_tipo_documento;
        $comentarios->fecha = Carbon::now(); 
       
        
        $comentarios->save();
    return redirect()->route('comentarios.index');
      
    }

    public function edit(string $id)
    {
        
        $comentarios = Comentarios::find($id);
      
        
        return view('comentarios.edit', compact('comentarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, string $id)
    {
        
        $comentarios = Comentarios::find($id);
        $comentarios->id_usuario = (int)$request ->  $id_user ;
        $comentarios->id_documento= (int)$request->id_documento;
        $comentarios->id_tipo_documento= (int)$request->id_tipo_documento;
        $comentarios->comentario = $request->comentario;
        $comentarios->fecha  = Carbon::now(); 
        ; 
       
        $comentarios->save();
        return redirect()->route('comentarios.index');
    }

    public function destroy(string $id)
    {
        $comentarios = Comentarios::find($id)->delete();
        return redirect()->route('comentarios.index');
    }

}
