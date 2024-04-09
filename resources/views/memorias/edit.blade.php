@extends('layouts.appfront')

@section('sidebar')
    @include('layouts.menu')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Editar Memoria</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form method="POST" action="{{ route('memorias.update', $memoria->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="Titulo">Título:</label>
                                <input type="text" name="Titulo" class="form-control" id="Titulo" value="{{ $memoria->Titulo }}">
                            </div>
                            <div class="form-group">
                                <label for="id_autor">Autor:</label>
                                <select name="id_autor" class="form-control" id="id_autor">
                                    @foreach($autores as $autor)
                                        <option value="{{ $autor->_id }}" {{ $memoria->id_autor == $autor->_id ? 'selected' : '' }}>
                                            {{ $autor->nombre }} {{ $autor->ape_paterno }} {{ $autor->ape_materno }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="empresa">Empresa:</label>
                                <input type="text" name="empresa" class="form-control" id="empresa" value="{{ $memoria->empresa }}">
                            </div>
                            <div class="form-group">
                                <label for="fecha_adquisicion">Fecha de Adquisición:</label>
                                <input type="text" name="fecha_adquisicion" class="form-control" id="fecha_adquisicion" value="{{ $memoria->fecha_adquisicion }}">
                            </div>
                            <div class="form-group">
                                <label for="anno_publicacion">Año de Publicación:</label>
                                <input type="text" name="anno_publicacion" class="form-control" id="anno_publicacion" value="{{ $memoria->anno_publicacion }}">
                            </div>
                            <div class="form-group">
                                <label for="estatus">Estatus:</label>
                                <select name="estatus" id="estatus" class="form-control">
                                    <option value="0" {{ $memoria->estatus == 0 ? 'selected' : '' }}>Inactivo</option>
                                    <option value="1" {{ $memoria->estatus == 1 ? 'selected' : '' }}>Activo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="imagen_memoria">Imagen de la Memoria:</label>
                                <input type="file" name="imagen_memoria" class="form-control-file" id="imagen_memoria">
                            </div>
                            <div class="form-group">
                                <label for="archivo_memoria">Archivo de la Memoria:</label>
                                <input type="file" name="archivo_memoria" class="form-control-file" id="archivo_memoria">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
@endsection
