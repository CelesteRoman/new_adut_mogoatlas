@extends('layouts.appfront')

@section('content')
            <div class="page-title">
              <div class="title_left">
                <h2>Tipo de usuario</h2>              
              </div>
             
            </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Actualizar información</h2>
                    <div class="clearfix"></div>                
                  <div class="x_content">
                    <br />
                    <form method="POST" name="form-del{{ $listaDistribucion->id }}" id="form-del{{ $listaDistribucion->id }}"  method="POST" action="{{route('listaDistribucion.update',['id'=>$listaDistribucion->id])}}">
                    @csrf 
                    @method('PUT')
                    <!-- -->
                    <!--otro-->
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion2">Id usuario<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="descripcion" id="descripcion2" required="required" class="form-control col-md-7 col-xs-12" placeholder="idusuario" value="{{$listaDistribucion->id}}">
                        </div>
                      </div>
                       <!--otro-->
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name2">Nombre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="name" id="name2" required="required" class="form-control col-md-7 col-xs-12" placeholder="Másculino" value="{{ $listaDistribucion->nombre_lista}}">
                        </div>
                      </div>
                        <!--otro-->
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email2">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="email" id="email2" required="required" class="form-control col-md-7 col-xs-12" placeholder="Másculino" value="{{ $listaDistribucion->detalles}}">
                        </div>
                      </div>
                       <!--otro-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion2">Genero <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="descripcion" id="descripcion2" required="required" class="form-control col-md-7 col-xs-12" placeholder="Másculino" value="{{ $listaDistribucion->created_at}}">
                        </div>
                      </div>
                      <!--otro-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abreviatura2">Rol<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="abreviatura" id="abreviatura2" required="required" class="form-control col-md-7 col-xs-12" placeholder="M" value="{{ $listaDistribucion->cantidad_archivos}}">
                        </div>
                      </div>
                       <!--otro-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abreviatura2">Carrera<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="abreviatura" id="abreviatura2" required="required" class="form-control col-md-7 col-xs-12" placeholder="M" value="{{ $listaDistribucion->updated_at}}">
                        </div>
                      </div>
                       
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                          <button type="submit" class="btn btn-success">Guardar cambios</button>
                          <button class="btn btn-primary" type="button">Nuevo</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
@endsection
