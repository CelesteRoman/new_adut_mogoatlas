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
                <h2>Tipo de Usuario</h2>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <!--<div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>-->
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Usuarios</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <!--<button class="btn btn-primary" type="button">Nuevo</button>-->
                    <a href="{{url('usuario/create')}}" class="btn btn-primary">Nuevo</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nombre</th>
                          <th>Correo Electrónico</th>
                          <th>Carrera</th>
                          <th>Rol</th>
                          <th>Fecha Creación</th>
                          <th>Fecha Actualización</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        @php
                          $cont = 1;
                        @endphp
                        @foreach($data as $user)
                        <tr>
                          <td>{{ $cont }}</td>
                          <td>{{ $user->name }} 
                          @if ($user->ape_paterno) 
                           {{ $user->ape_paterno }} 
                            @endif 
                          @if ($user->ape_materno) 
                           {{ $user->ape_materno }} 
                            @endif
                          </td>
                          <td>{{ $user->email }}</td>
                          
                          <td>@if ($user->abr_carrera)                            
                           {{ $user->abr_carrera}} 
                            @endif 
                          </td>
                          <td>
                              {{ $user->rol->rol }}
                          </td>
                          <td>{{ $user->created_at }}</td>
                          <td>{{ $user->updated_at }}</td>
                          <td> <a href="{{ url('usuario/edit/{id}')}},['id'=>$user->id]) }}"><span aria-hidden="true"></span></a>
                            &nbsp;
                            <form method="POST" name="form-del{{ $user->id }}" id="form-del{{ $user->id }}" action="{{ route('usuario.destroy',['id'=>$user->id]) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('form-del{{ $user->id }}').submit();"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
