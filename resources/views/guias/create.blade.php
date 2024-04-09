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
                        <h2>Agregar Nueva Guía</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form method="POST" action="{{ route('guias.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="Titulo">Título de la Guía:</label>
                                <input type="text" name="Titulo" class="form-control" id="Titulo" placeholder="Título de la Guía">
                            </div>
                            <div class="form-group">
                                <label for="id_tipo_documento">Tipo de Documento:</label>
                                <select name="id_tipo_documento" id="id_tipo_documento" class="form-control">
                                    @foreach ($tipoDocumentos as $tipoDocumento)
                                        <option value="{{ $tipoDocumento->id }}">{{ $tipoDocumento->tipo_documento }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_autor">Autor:</label>
                                <select name="id_autor" id="id_autor" class="form-control">
                                    @foreach ($autores as $autor)
                                        <option value="{{ $autor->id }}">{{ $autor->nombre }} {{ $autor->ape_paterno }} {{ $autor->ape_materno }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_carrera">Carrera:</label>
                                <select name="id_carrera" id="id_carrera" class="form-control">
                                    @foreach ($carreras as $carrera)
                                        <option value="{{ $carrera->id }}">{{ $carrera->carrera }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_materia">Materia:</label>
                                <select name="id_materia" id="id_materia" class="form-control">
                                    @foreach ($materias as $materia)
                                        <option value="{{ $materia->id }}">{{ $materia->materia }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="anno_publicacion">Año de Publicación:</label>
                                <input type="text" name="anno_publicacion" class="form-control" id="anno_publicacion" placeholder="Año de Publicación">
                            </div>
                            <div class="form-group">
                                <label for="fecha_adquisicion">Fecha de Adquisición:</label>
                                <input type="text" name="fecha_adquisicion" class="form-control" id="fecha_adquisicion" placeholder="Fecha de Adquisición">
                            </div>
                            <div class="form-group">
                                <label for="estatus">Estatus:</label>
                                <input type="text" name="estatus" class="form-control" id="estatus" placeholder="Estatus">
                            </div>
                            <div class="form-group">
                                <label for="ruta_ubicacion">Archivo de la Guía:</label>
                                <input type="file" name="ruta_ubicacion" class="form-control-file" id="ruta_ubicacion">
                            </div>
                            <div class="form-group">
                                <label for="ruta_portada">Imagen de la Guía:</label>
                                <input type="file" name="ruta_portada" class="form-control-file" id="ruta_portada">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Agregar Guía</button>
                            <a href="{{ route('guias.index') }}" class="btn btn-secondary btn-block mt-3">Regresar</a>
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
