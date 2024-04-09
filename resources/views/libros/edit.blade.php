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
                        <h2>Editar Libro</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form method="POST" action="{{ route('libros.update', $libros->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="Titulo">Título del Libro:</label>
                                <input type="text" name="Titulo" class="form-control" id="Titulo" value="{{ $libros->Titulo }}">
                            </div>
                            <div class="form-group">
                                <label for="id_autor">Autor:</label>
                                <select name="id_autor" class="form-control" id="id_autor">
                                    @foreach($autores as $autor)
                                        <option value="{{ $autor->_id }}" {{ $libros->id_autor == $autor->_id ? 'selected' : '' }}>
                                            {{ $autor->nombre }} {{ $autor->ape_paterno }} {{ $autor->ape_materno }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="estatus">Estatus:</label>
                                <select name="estatus" id="estatus" class="form-control">
                                    <option value="0" {{ $libros->estatus == 0 ? 'selected' : '' }}>Inactivo</option>
                                    <option value="1" {{ $libros->estatus == 1 ? 'selected' : '' }}>Activo</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>
                        </form>
                        <a href="{{ route('libros.index') }}" class="btn btn-secondary btn-block mt-3">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
