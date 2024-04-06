@extends('layouts.appfront')

@section('content')
            <div class="page-title">
              <div class="title_left">
                <h2>Tipo de usuario</h2>              
              </div>
<!--
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
-->                
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
                    <form method="POST" name="form-del{{ $user->id }}" id="form-del{{ $user->id }}"  method="POST" action="{{route('usuario.update',['id'=>$user->id])}}">
                    @csrf 
                    @method('PUT')
                    <!-- -->
                    <!--otro-->
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion2">Id usuario<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="descripcion" id="descripcion2" required="required" class="form-control col-md-7 col-xs-12" placeholder="idusuario" value="{{$user->id}}">
                        </div>
                      </div>
                       <!--otro-->
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name2">Nombre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="name" id="name2" required="required" class="form-control col-md-7 col-xs-12" placeholder="Másculino" value="{{ $user->name}}">
                        </div>
                      </div>
                        <!--otro-->
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email2">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="email" id="email2" required="required" class="form-control col-md-7 col-xs-12" placeholder="Másculino" value="{{ $user->email}}">
                        </div>
                      </div>
                       <!--otro-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion2">Genero <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="descripcion" id="descripcion2" required="required" class="form-control col-md-7 col-xs-12" placeholder="Másculino" value="{{ $user->gender->descripcion}}">
                        </div>
                      </div>
                       <!--otro-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abreviatura2">Carrera<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="abreviatura" id="abreviatura2" required="required" class="form-control col-md-7 col-xs-12" placeholder="M" value="{{ $user->carrera->carrera}}">
                        </div>
                      </div>
                       <!--otro-->
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="abreviatura2">Rol<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="abreviatura" id="abreviatura2" required="required" class="form-control col-md-7 col-xs-12" placeholder="M" value="{{ $user->rol->rol}}">
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
