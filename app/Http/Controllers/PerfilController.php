<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request\ProfilUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
   /* $data = User::where('email', 'usuario@example.com')->first();*/

      return view('perfil.index');
    }

 /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profil.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfilUpdateRequest $request): RedirectResponse
    {
      /*   // Obtener el usuario actual
       // $request->user()->fill($request->validated());

       $user = User::find($id);
        
        // Actualizar el perfil del usuario con el perfil seleccionado
        $user->profile = $request->selected_profile;
        $user->save();
      
        return view('perfil.index')->with(compact('user'));
     */
        $user = User::find($id);
        $user->ruta_perfil = $request->ruta_perfil;
        $user->save();
        return redirect()->route('perfil.index');
    
    }
}

