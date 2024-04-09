@extends('layouts.appfront')

@section('sidebar')
  @include('layouts.menu')
  @parent
@endsection

@section('content')
  <div class="container">
    <h1>Ver Usuario</h1>

    @if (! $user)
      <div class="alert alert-danger">
        <p>Usuario no encontrado.</p>
      </div>
    @else
      <div class="card">
        <div class="card-body">
          <p><strong>Nombre:</strong> {{ $user->name }} {{ $user->ape_paterno }} {{ $user->ape_materno }}</p>
          <p><strong>Correo Electrónico:</strong> {{ $user->email }}</p>
          <p><strong>Rol:</strong> {{ $user->rol->nombre }}</p>  
          
        </div>
      </div>
    @endif
  </div>
@endsection
