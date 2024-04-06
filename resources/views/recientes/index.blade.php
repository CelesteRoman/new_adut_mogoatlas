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
                <h2>RECIENTES</h2>
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
                    <h2>Lista de libros recien leidos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <!--<button class="btn btn-primary" type="button">Nuevo</button>-->
                    <a href="#" class="btn btn-primary">Nuevo</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Portada</th>
                          <th>Titulo</th>
                          <th>Fecha</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        @php
                          $cont = 1;
                        @endphp
                        @foreach($data as $recientes)
                        <tr>
                        <td>
                        <img src="{{ asset('images/administrador.jpg') }}"alt="No">
                        </td>
                        <td>{{ $recientes->Titulo }}</td>
                        <td>{{ $recientes->fecha }}</td>
                        <td> <a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            &nbsp;
                            <form method="POST" name="#" id="#" action="#" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('#').submit();"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
