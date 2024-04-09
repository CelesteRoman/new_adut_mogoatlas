@extends('layouts.appfront')
  @section('sidebar')
  <!-- Heredamos con parent lo que hay en la plantilla base pero añadimos otro elemento al menú -->
    @include('layouts.menu')
    @parent
  @endsection

@section('content')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>Comentarios</h2>
              </div>
              


            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de comentarios</h2>
                    <ul class="nav navbar-right panel_toolbox">
                   <a href="{{ route('dashboard') }}" class="btn btn-primary">Regresar</a>
                    <a href="{{ route('comentarios.create') }}" class="btn btn-primary">Nuevo comentario</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                         
                          <th>Comentario</th>
                          <th>Fecha creación</th>
                          <th>Fecha actualización</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        @php
                          $cont = 1;
                        @endphp
                        @foreach($data as $comentarios)
                        <tr>
                          
                          <td>{{ $comentarios->comentario}}</td>
                          <td>{{ $comentarios->created_at }}</td>
                          <td>{{ $comentarios->updated_at }}</td>
                         
                          <td> <a href="{{ route('comentarios.edit',['id'=>$comentarios->id]) }}" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            &nbsp;
                            <form method="POST" name="form-del{{ $comentarios->id }}" id="form-del{{ $comentarios->id }}" action="{{ route('comentarios.destroy',['id'=>$comentarios->id]) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('form-del{{ $comentarios->id }}').submit();"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
@endsection
