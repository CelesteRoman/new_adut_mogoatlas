<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Auth;
class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     // $users = DB::table('users')->get();
     // dd($users);
     $data = User::with('rol')->get();
     /* foreach($data as $item){
              dd($item->gender->descripcion);
      }*/
     // dd($data->gender->abreviatura);

      //dd($data);
      //dd($data->count());
      return view('administrador.index')->with(compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = user::all(); 
        return view('administrador.create')->with(compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request['name'];
        $user->ape_paterno = $request['ape_paterno'];
        $user->ape_materno = $request['ape_materno'];
        $user->email = $request['email'];
        $user->password = $request['password']; // Hash password
        
        $user->id_rol = (int) $request['id_rol'];
        $user->id_carrera = (int) $request['id_carrera'];
        $user->abr_carrera = (string) $request['abr_carrera'];
        $user->ruta_perfil = (string) $request['ruta_perfil'];

        
        $user->save();

        return redirect()->route('administrador.index')->with('success', 'Administrador Creado Exitosamente!');
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
        $user = User::find($id);
        return view('administrador.edit')->with(compact('user'));
      /*  $data = User::find($id);
        return view('administrador.edit')->with(compact('data'));*/
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->ape_paterno = $request->ape_paterno;
        $user->ape_materno = $request->ape_materno;
        $user->email = $request->email;
        $user->password = $request->password; // Hash password
        $user->id_rol = $request->id_rol;
       
        $user->save();
        return redirect()->route('administrador.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('administrador.index');
    }
}
