@extends('layouts.appfront')
  @section('sidebar')
  <!-- Heredamos con parent lo que hay en la plantilla base pero añadimos otro elemento al menú -->
    @include('layouts.menu')
    @parent
  @endsection

@section('content')
<div class="">
            <div class="page-title">
              <div class="text-center">
                <h2>Lista Recientes</h2>
              </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 

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
                        @foreach($data as $favoritos)
                        <tr>
                        <td>
                        <img src="{{ asset('images/1/libro_dobot.jpg') }}"  class="img-fluid" alt="No">
                        </td>
                        <td> {{ 'Dobot-Blockly-Workbook' }} </td>
                        <td> {{ '2023-11-27 05:02:15' }} </td>
                        <td> <a href="{{Route('leer.index')}}" class="btn btn-primary">Leer</a> </td>         
                        </tr>
                        <tr>
                        <td>
                        <img src="{{ asset('images/1/Educacion_en_gastronomia_su_vinculo_con_la_identidad_cultural_y_el_turismo.png') }}" style="width:41%; height:35%;" class="img-fluid" alt="No">
                        </td>
                        <td> {{ 'Memoria de estadía profesional elaborada Jesús Alberto Gomez' }} </td>
                        <td> {{ '2023-11-27 05:02:15' }} </td>
                        <td> <a href="{{Route('leerMemoria.index')}}" class="btn btn-primary">Leer</a> </td>
                                   
                        </tr>
                       
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection
