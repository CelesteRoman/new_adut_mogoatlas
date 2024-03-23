<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Auth;
class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     // $users = DB::table('users')->get();
     // dd($users);
     $data = User::all();
     /* foreach($data as $item){
              dd($item->gender->descripcion);
      }*/
     // dd($data->gender->abreviatura);

      //dd($data);
      //dd($data->count());
      return view('maestro.index')->with(compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view('maestro.edit')->with(compact('user'));
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
        $user->email = $request->email;
       
        $user->save();
        return redirect()->route('maestro.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('maestro.index');
    }
}
