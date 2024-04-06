<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ArchivosController extends Controller
{
    public function buscarArchivos(Request $request)
    {
        $searchQuery = $request->input('query');

        $datos = DB::collection('ws_archivos')
            ->where('titulo', 'LIKE', '%' . $searchQuery . '%')
            ->get();

        return view('dashboard')->with('datos', $datos);
    }
}