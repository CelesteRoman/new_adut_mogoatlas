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
                    <h2>Lista de libros</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    
                    <a href="{{Route('libros.create')}}" class="btn btn-primary">Nuevo</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Titulo</th>
                          <th>Autor</th>
                          <th>estatus</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        @php
                          $cont = 1;
                        @endphp
                        @foreach($data as $libros)
                        <tr>
                          <td>{{ $cont }}</td>
                          <td>{{ $libros-> Titulo }}</td>
                          <td>
    @if ($libros->autor)
        {{ $libros->autor->nombre }} {{ $libros->autor->ape_paterno }} {{ $libros->autor->ape_materno }}
    @else
        
    @endif
</td>
                          <td>{{ $libros->estatus }}</td>
                          <td> <a href="{{ route('libros.edit',['id'=>$libros->id]) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                          <form action="{{ route('libros.destroy', ['libros' => $libros->id]) }}" method="POST" style="display: inline;">
                          @csrf
                          @method('DELETE')
                             <button type="submit" class="delete" title="Delete" data-toggle="tooltip">
                            <i class="glyphicon glyphicon-trash"></i>
</button>
</form>

                                           
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
