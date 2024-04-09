@extends('layouts.appfront')

@section('sidebar')
    @include('layouts.menu')
    @parent
@endsection

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h2>Nuevo Administrador</h2>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Crear Administrador</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <a href="{{ url('administrador/list') }}" class="btn btn-default pull-right">Volver</a>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ route('administrador.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="id_rol">Rol</label>
                           <select name="id_rol" id="rol_id" class="form-control" required>
                                <option value="">Seleccione...</option>
                                <option value="3">Administrador</option>
                                <option value="2">Maestro</option>
                                <option value="1">Alumno</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
