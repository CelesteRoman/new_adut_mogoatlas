<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\ListaDistribucionController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\MemoriasController;
use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\GuiasController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\RecientesController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\ArchivosController;
use App\Http\Controllers\Archivos2Controller;
use App\Http\Controllers\Archivos3Controller;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
//Rutas para el controlador de usuarios
/* //Ruta agregada , practica mondgo
.
.
.
.
Route::get('/phpmyinfo', function () {
    phpinfo();
})->name('phpmyinfo'); */


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*Route::get('pdf1', function () {
    return view('pdfViewer');
})->middleware(['auth', 'verified'])->name('pdf1');*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// routes/web.php

//use App\Http\Controllers\ProfileController;

//Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->name('update.profile');
/*
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ArchivosController::class, 'index'])->name('dashboard');
}); */

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/favoritos/list', [FavoritosController::class, 'index'])->name('favoritos.index');
    Route::get('/favoritos/create', [FavoritosController::class, 'create'])->name('favoritos.create');
    Route::get('/favoritos/edit/{id}', [FavoritosController::class, 'edit'])->name('favoritos.edit');
    Route::delete('/favoritos/delete/{id}', [FavoritosController::class, 'destroy'])->name('favoritos.destroy');
    Route::post('/favoritos/store', [FavoritosController::class, 'store'])->name('favoritos.store');
    Route::put('/favoritos/update/{id}', [FavoritosController::class, 'update'])->name('favoritos.update');

});
//Leer_libro
Route::middleware('auth')->group(function () {
    Route::get('/leer/list', [ArchivosController::class, 'index'])->name('leer.index');
   

});
//Leer_memoria
Route::middleware('auth')->group(function () {
    Route::get('/leerMemoria/list', [Archivos2Controller::class, 'index'])->name('leerMemoria.index');
});
//Leer_guia
Route::middleware('auth')->group(function () {
    Route::get('/leerGuia/list', [Archivos3Controller::class, 'index'])->name('leerGuia.index');
});
//Perfil
Route::middleware('auth')->group(function () {
    Route::get('/perfil/list', [PerfilController::class, 'index'])->name('perfil.index');
    Route::put('/profil/list', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/perfil/update', [ProfilController::class, 'update'])->name('perfil.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/rol/list', [RolController::class, 'index'])->name('rol.index');
    Route::get('/rol/create', [RolController::class, 'create'])->name('rol.create');
    Route::get('/rol/edit/{id}', [RolController::class, 'edit'])->name('rol.edit');
    Route::delete('/rol/delete/{id}', [RolController::class, 'destroy'])->name('rol.destroy');
    Route::post('/rol/store', [RolController::class, 'store'])->name('rol.store');
    Route::put('/rol/update/{id}', [RolController::class, 'update'])->name('rol.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/carrera/list', [CarreraController::class, 'index'])->name('carrera.index');
    Route::get('/carrera/create', [CarreraController::class, 'create'])->name('carrera.create');
    Route::get('/carrera/edit/{id}', [CarreraController::class, 'edit'])->name('carrera.edit');
    Route::delete('/carrera/delete/{id}', [CarreraController::class, 'destroy'])->name('carrera.destroy');
    Route::post('/carrera/store', [CarreraController::class, 'store'])->name('carrera.store');
    Route::put('/carrera/update/{id}', [CarreraController::class, 'update'])->name('carrera.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/listaDistribucion/list', [ListaDistribucionController::class, 'index'])->name('listaDistribucion.index');
    Route::get('/listaDistribucion/create', [ListaDistribucionController::class, 'create'])->name('listaDistribucion.create');
    Route::get('/listaDistribucion/edit/{id}', [ListaDistribucionController::class, 'edit'])->name('listaDistribucion.edit');
    Route::delete('/listaDistribucion/delete/{id}', [ListaDistribucionController::class, 'destroy'])->name('listaDistribucion.destroy');
    Route::post('/listaDistribucion/store', [ListaDistribucionController::class, 'store'])->name('listaDistribucion.store');
    //Route::put('/listaDistribucion/update/{id}', [ListaDistribucionController::class, 'update'])->name('listaDistribucion.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/usuario/list', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::get('/usuario/create', [UsuarioController::class, 'create'])->name('usuario.create');
    Route::get('/usuario/edit/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');
    Route::delete('/usuario/delete/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
    Route::post('/usuario/store', [UsuarioController::class, 'store'])->name('usuario.store');
    Route::put('/usuario/update/{id}', [UsuarioController::class, 'update'])->name('usuario.update');

    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/libros/list', [LibrosController::class, 'index'])->name('libros.index');
    Route::get('/libros/create', [LibrosController::class, 'create'])->name('libros.create');
    Route::get('/libros/edit/{id}', [App\Http\Controllers\LibrosController::class, 'edit'])->name('libros.edit');
    Route::post('/libros/store', [App\Http\Controllers\LibrosController::class, 'store'])->name('libros.store');
   Route::delete('/libros/{libros}', [App\Http\Controllers\LibrosController::class, 'destroy'])->name('libros.destroy');

    Route::put('/libros/update/{id}', [LibrosController::class, 'update'])->name('libros.update');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/articulos/list', [ArticulosController::class, 'index'])->name('articulos.index');
    Route::get('/articulos/create', [ArticulosController::class, 'create'])->name('articulos.create');
    Route::get('/articulos/edit/{id}', [ArticulosController::class, 'edit'])->name('articulos.edit');
    Route::delete('/articulos/{articulos}', [App\Http\Controllers\ArticulosController::class, 'destroy'])->name('articulos.destroy');
    Route::post('/articulos/store', [ArticulosController::class, 'store'])->name('articulos.store');
    Route::put('/articulos/update/{id}', [ArticulosController::class, 'update'])->name('articulos.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/memorias/list', [MemoriasController::class, 'index'])->name('memorias.index');
    //Route::get('/memorias/create', [MemoriasController::class, 'create'])->name('memorias.create');
    Route::get('/memorias/edit/{id}', [MemoriasController::class, 'edit'])->name('memorias.edit');
    Route::delete('/memorias/{memorias}', [App\Http\Controllers\MemoriasController::class, 'destroy'])->name('memorias.destroy');
    Route::get('/memorias/create', [MemoriasController::class, 'create'])->name('memorias.create');
    Route::post('/memorias', [MemoriasController::class, 'store'])->name('memorias.store');

    //Route::post('/memorias/store', [MemoriasController::class, 'store'])->name('memorias.store');
    Route::put('/memorias/update/{id}', [MemoriasController::class, 'update'])->name('memorias.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/guias/list', [GuiasController::class, 'index'])->name('guias.index');
    Route::get('/guias/create', [GuiasController::class, 'create'])->name('guias.create');
    Route::get('/guias/edit/{id}', [GuiasController::class, 'edit'])->name('guias.edit');
    Route::delete('/guias/{guias}', [App\Http\Controllers\GuiasController::class, 'destroy'])->name('guias.destroy');
    Route::post('/guias/store', [GuiasController::class, 'store'])->name('guias.store');
    Route::put('/guias/update/{id}', [GuiasController::class, 'update'])->name('guias.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/administrador/list', [AdministradorController::class, 'index'])->name('administrador.index');
    Route::get('/administrador/create', [AdministradorController::class, 'create'])->name('administrador.create');
    Route::get('/administrador/edit/{id}', [AdministradorController::class, 'edit'])->name('administrador.edit');
    Route::delete('/administrador/delete/{id}', [AdministradorController::class, 'destroy'])->name('administrador.destroy');
    Route::post('/administrador/store', [AdministradorController::class, 'store'])->name('administrador.store');
    Route::put('/administrador/update/{id}', [AdministradorController::class, 'update'])->name('administrador.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/maestro/list', [MaestroController::class, 'index'])->name('maestro.index');
    Route::get('/maestro/create', [MaestroController::class, 'create'])->name('maestro.create');
    Route::get('/maestro/edit/{id}', [MaestroController::class, 'edit'])->name('maestro.edit');
    Route::delete('/maestro/delete/{id}', [MaestroController::class, 'destroy'])->name('maestro.destroy');
    Route::post('/maestro/store', [MaestroController::class, 'store'])->name('maestro.store');
    Route::put('/maestro/update/{id}', [MaestroController::class, 'update'])->name('maestro.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/alumno/list', [AlumnoController::class, 'index'])->name('alumno.index');
    Route::get('/alumno/create', [AlumnoController::class, 'create'])->name('alumno.create');
    Route::get('/alumno/edit/{id}', [AlumnoController::class, 'edit'])->name('alumno.edit');
    Route::delete('/alumno/delete/{id}', [AlumnoController::class, 'destroy'])->name('alumno.destroy');
    Route::post('/alumno/store', [AlumnoController::class, 'store'])->name('alumno.store');
    Route::put('/alumno/update/{id}', [AlumnoController::class, 'update'])->name('alumno.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/recientes/list', [RecientesController::class, 'index'])->name('recientes.index');
    Route::get('/recientes/create', [RecientesController::class, 'create'])->name('recientes.create');
    Route::get('/recientes/edit/{id}', [RecientesController::class, 'edit'])->name('recientes.edit');
    Route::delete('/recientes/delete/{id}', [RecientesController::class, 'destroy'])->name('recientes.destroy');
    Route::post('/recientes/store', [RecientesController::class, 'store'])->name('recientes.store');
    Route::put('/recientes/update/{id}', [RecientesController::class, 'update'])->name('recientes.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/comentarios/list', [ComentariosController::class, 'index'])->name('comentarios.index');
    Route::get('/comentarios/create', [ComentariosController::class, 'create'])->name('comentarios.create');
    Route::get('/comentarios/edit/{id}', [ComentariosController::class, 'edit'])->name('comentarios.edit');
    Route::delete('/comentarios/delete/{id}', [ComentariosController::class, 'destroy'])->name('comentarios.destroy');
    Route::post('/comentarios/store', [ComentariosController::class, 'store'])->name('comentarios.store');
    Route::put('/comentarios/update/{id}', [ComentariosController::class, 'update'])->name('comentarios.update');
});
