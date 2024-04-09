@extends('layouts.appfront')

@section('sidebar')
    @include('layouts.menu')
    @parent
@endsection

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
              
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Lista de Articulos</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="{{ Route('articulos.create') }}" class="btn btn-primary">Nuevo</a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cont = 1;
                                @endphp
                                @foreach($data as $articulos)
                                    <tr>
                                        <td>{{ $cont }}</td>
                                        <td>{{ $articulos->Titulo }}</td>
                                       <td>
                                        @if ($articulos->autor)
        {{ $articulos->autor->nombre }} {{ $articulos->autor->ape_paterno }} {{ $articulos->autor->ape_materno }}
    @else
        
    @endif
    </td>
    <td>
                          @if($articulos->estatus == 1)
                              Activo
                              @else
                                  Inactivo
                              @endif
                          </td>
                                        <td>
                                            <a href="{{ route('articulos.edit', ['id' => $articulos->id]) }}">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                            <form action="{{ route('articulos.destroy', ['articulos' => $articulos->id]) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete" title="Delete" data-toggle="tooltip">
        <i class="glyphicon glyphicon-trash"></i>
    </button>
</form>

                                        </td>
                                    </tr>
                                    @php
                                        $cont++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
