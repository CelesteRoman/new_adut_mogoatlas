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
                        <h2>Nueva Lista de distribucion</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form method="POST" action="{{ route('listaDistribucion.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nombre_lista">Nombre de la lista:</label>
                                <textarea name="nombre_lista" class="form-control" id="nombre_lista" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="cantidad_archivos">Cantidad de archivos</label>
                                <textarea name="cantidad_archivos" class="form-control" id="cantidad_archivos" rows="5"></textarea>
                            </div>
                            <div class="form-group">
    <label for="id_libro">Selecciona un libro:</label>
                                <select name="id_libro" id="id_libro" class="form-control">
                                    @foreach ($libros as $libro)
                                        <option value="{{ $libro->id }}">{{ $libro->Titulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                    <label for="id_libro">Selecciona la memoria:</label>
                                <select name="id_memoria" id="id_memoria" class="form-control">
                                    @foreach ($memoria as $memoria)
                                        <option value="{{ $memoria->id }}">{{ $memoria->Titulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                    <label for="id_libro">Selecciona el articulo:</label>
                                <select name="id_articulo" id="id_articulo" class="form-control">
                                    @foreach ($articulo as $articulo)
                                        <option value="{{ $articulo->id }}">{{ $articulo->Titulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                    <label for="id_libro">Selecciona la guia:</label>
                                <select name="id_guia" id="id_guia" class="form-control">
                                    @foreach ($guias as $guias)
                                        <option value="{{ $guias->id }}">{{ $guias->Titulo }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_tipo_documento">Tipo de Documento:</label>
                                <select name="id_tipo_documento" id="id_tipo_documento" class="form-control">
                                    @foreach ($tipoDocumentos as $tipoDocumento)
                                        <option value="{{ $tipoDocumento->id }}">{{ $tipoDocumento->tipo_documento }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Crear Lista de Distribuciòn</button>
                            <a href="{{ route('listaDistribucion.index') }}" class="btn btn-primary btn-block">Regresar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection