@extends('layouts.appfront')

@section('sidebar')
    @include('layouts.menu')
    @parent
@endsection

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h2>Nuevo Usuario</h2>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Crear Usuario</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ route('usuario.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nombre (s)</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Apellido Paterno</label>
                            <input type="text" class="form-control" id="ape_paterno" name="ape_paterno" placeholder="Apellido Paterno" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Apellido Materno</label>
                            <input type="text" class="form-control" id="ape_materno" name="ape_materno" placeholder="Apellido Materno" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el correo electrónico" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese la contraseña" required>
                        </div>

                        </div>

                        <div class="form-group">
                            <label for="id_carrera">Carrera</label>
                            <select name="id_carrera" id="id_carrera" class="form-control">
                                <option value="">Seleccione...</option>
                                <option value="2">GASTRONOMIA</option>
                                <option value="3">DESARROLLO E INOVACIÓN DE NEGOCIOS</option>
                                <option value="1">TECNICO SUPERIOR USNIVERSITARIO DE TECNOLÓGIAS DE LA COMUNICACIÓN</option>
                                <option value="4">MECATRONICA</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="abr_carrera">Abreviatura Carrera</label>
                            <select name="abr_carrera" id="abr_carrera" class="form-control">
                                <option value="">Seleccione...</option>
                                <option value="GASTRONOMIA" >GASTRONOMIA</option> 
                                <option value="NEGOCIOS" >NEGOCIOS</option> 
                                <option value="TIC'S" >TIC'S</option> 
                                <option value="MECA">MECA</option>
                            </select>
                        </div> 

                        <div class="form-group">
                            <label for="id_rol">Rol</label>
                            <select name="id_rol" id="rol_id" class="form-control" required>
                                <option value="">Seleccione...</option>
                                <option value="3">Administrador</option>
                                <option value="2">Maestro</option>
                                <option value="1">Alumno</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ruta_perfil">Perfil</label>
                            <input type="file" class="form-control" id="ruta_perfil" name="ruta_perfil" placeholder="Ingrese el Perfil">
                        </div>
                        
                        <div class="form-group">
                            <label for="estatus">Estatus</label>
                            <select name="estatus" id="estatus" class="form-control">
                                <option value="">Seleccione...</option>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ url('usuario/list') }}" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
