@extends('layouts.appfront')

@section('sidebar')
    @include('layouts.menu')
    @parent
@endsection

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h2>Editar Alumno</h2>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  <div class="container">
                    <h1>Editar Alumno</h1>
            
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            
                    <form action="{{ route('maestro.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
            
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>
            
                        <div class="form-group">
                            <label for="ape_paterno">Apellido Paterno:</label>
                            <input type="text" id="ape_paterno" name="ape_paterno" class="form-control" value="{{ old('ape_paterno', $user->ape_paterno) }}" required>
                        </div>
            
                        <div class="form-group">
                            <label for="ape_materno">Apellido Materno:</label>
                            <input type="text" id="ape_materno" name="ape_materno" class="form-control" value="{{ old('ape_materno', $user->ape_materno) }}" required>
                        </div>
            
                        <div class="form-group">
                            <label for="email">Correo Electrónico:</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>
            
                        <div class="form-group">
                            <label for="password">Contraseña (Opcional):</label>
                            <input type="password" id="password" name="password" class="form-control">
                            <small class="text-muted">Deje este campo vacío si no desea cambiar la contraseña.</small>
                        </div>
            
                        <div class="form-group">
                            <label for="id_rol">Rol:</label>
                            <select id="id_rol" name="id_rol" class="form-control" required>
                                <option value="">Seleccione un rol</option>
                                <option value="1" {{ $user->id_rol == 1 ? 'selected' : '' }}>Alumno</option>
                                <option value="2" {{ $user->id_rol == 2 ? 'selected' : '' }}>Maestro</option>
                                <option value="3" {{ $user->id_rol == 3 ? 'selected' : '' }}>Administrador</option>
                            </select>
                        </div>
            
                        <div class="form-group">
                            <label for="id_carrera">Carrera:</label>
                            <select id="id_carrera" name="id_carrera" class="form-control" required>
                                <option value="1" {{ $user->id_carrera == 1 ? 'selected' : '' }}>TECNICO SUPERIOR USNIVERSITARIO DE TECNOLÓGIAS DE LA COMUNICACIÓN</option>
                                <option value="2" {{ $user->id_carrera == 2 ? 'selected' : '' }}>GASTRONOMIA</option>
                                <option value="3" {{ $user->id_carrera == 3 ? 'selected' : '' }}>DESARROLLO E INOVACIÓN DE NEGOCIOS</option>
                                <option value="4" {{ $user->id_carrera == 4 ? 'selected' : '' }}>MECATRONICA</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="abr_carrera">Abreviatura Carrera</label>
                            <select name="abr_carrera" id="abr_carrera" class="form-control" required>
                                <option value="">Seleccione una abreviatura</option>
                                <option value="MECA" {{ $user->abr_carrera == 'MECA' ?'selected' : '' }}>MECA</option>
                                <option value="GASTRO" {{ $user->abr_carrera == 'GASTRO' ?'selected' : '' }}>GASTRO</option>
                                <option value="NEGOCIOS" {{ $user->abr_carrera == 'NEGICIOS' ?'selected' : '' }}>NEGOCIOS</option>
                                <option value="TIC'S" {{ $user->abr_carrera == 'TICS' ?'selected' : '' }}>TIC'S</option>
                            </select>
                            </select>
                        </div>
            
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
                        <a href="{{ url('maestro/list') }}" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
