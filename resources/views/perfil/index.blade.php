@extends('layouts.appfront')
  @section('sidebar')
  <!-- Heredamos con parent lo que hay en la plantilla base pero añadimos otro elemento al menú -->
    @include('layouts.menu')
    @parent
  @endsection

@section('content')
<div class="">
        <div class="img-circle text-center">
            <h2>Perfil de usuario</h2>
            <br>
            <img class="img-circle" src="{{ asset('images/foto_perfil/' . Auth::user()->ruta_perfil . '.png') }}" alt="User-Profile-Image" style="height: 200px; width: 200px;">
        </div>
    <div class="text-center">
        <div class="">
            <div class="card">
                    <h2>Perfil de {{ Auth::user()->name }}</h2>
                                  <div class="card-body">
                                  <table class="table table-striped">
                                  <thead>
                                  <tr>
                                  <th>Datos del perfil de usuario:</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr>                                                                 
                                  <td>{{ Auth::user()->name }} {{ Auth::user()->ape_paterno }} {{ Auth::user()->ape_materno }}</td>
                                  <td>{{ Auth::user()->email }}</td>
                                  </tr>
                                  </tbody>
                              </table>
                              <table class="table table-striped">
                                  <tbody>
                                  <tr>                                                                 
                                  <td><!-- Inicio de la sección de selección de foto de perfil -->
                                  <img class="img-circle " src="{{ asset('images/foto_perfil/perfil1.png') }}" alt="User-Profile-Image" style="height: 100px; width: 100px; cursor: pointer;" onclick="cambiarPerfil('perfil1')">
                                  <img class="img-circle " src="{{ asset('images/foto_perfil/perfil2.png') }}" alt="User-Profile-Image" style="height: 100px; width: 100px; cursor: pointer;" onclick="cambiarPerfil('perfil2')">
                                  <img class="img-circle " src="{{ asset('images/foto_perfil/perfil3.png') }}" alt="User-Profile-Image" style="height: 100px; width: 100px; cursor: pointer;" onclick="cambiarPerfil('perfil3')">
                                  <img class="img-circle " src="{{ asset('images/foto_perfil/perfil4.png') }}" alt="User-Profile-Image" style="height: 100px; width: 100px; cursor: pointer;" onclick="cambiarPerfil('perfil4')">
                                  <img class="img-circle " src="{{ asset('images/foto_perfil/perfil5.png') }}" alt="User-Profile-Image" style="height: 100px; width: 100px; cursor: pointer;" onclick="cambiarPerfil('perfil5')">
                                  <img class="img-circle " src="{{ asset('images/foto_perfil/perfil6.png') }}" alt="User-Profile-Image" style="height: 100px; width: 100px; cursor: pointer;" onclick="cambiarPerfil('perfil6')">
                                  <!-- Fin de la sección de selección de foto de perfil --></td>
                                  </tr>
                                  </tbody>
                              </table>
                          </div>
                    </div>
                </div>
            </div>
        </div>

   <!-- ini  
   <div class="col-md-8">
            <div class="row justify-content-center">
                Inicio de la sección de selección de foto de perfil 
                <img class="img-circle " src="{{ asset('images/foto_perfil/perfil1.png') }}" alt="User-Profile-Image" style="height: 100px; width: 100px; cursor: pointer;" onclick="cambiarPerfil('perfil1')">
                <img class="img-circle " src="{{ asset('images/foto_perfil/perfil2.png') }}" alt="User-Profile-Image" style="height: 100px; width: 100px; cursor: pointer;" onclick="cambiarPerfil('perfil2')">
                <img class="img-circle " src="{{ asset('images/foto_perfil/perfil3.png') }}" alt="User-Profile-Image" style="height: 100px; width: 100px; cursor: pointer;" onclick="cambiarPerfil('perfil3')">
                <img class="img-circle " src="{{ asset('images/foto_perfil/perfil4.png') }}" alt="User-Profile-Image" style="height: 100px; width: 100px; cursor: pointer;" onclick="cambiarPerfil('perfil4')">
                <img class="img-circle " src="{{ asset('images/foto_perfil/perfil5.png') }}" alt="User-Profile-Image" style="height: 100px; width: 100px; cursor: pointer;" onclick="cambiarPerfil('perfil5')">
                <img class="img-circle " src="{{ asset('images/foto_perfil/perfil6.png') }}" alt="User-Profile-Image" style="height: 100px; width: 100px; cursor: pointer;" onclick="cambiarPerfil('perfil6')">
              Fin de la sección de selección de foto de perfil
            </div>
        </div>   Fini  -->
     
    <form action="{{ route('perfil.update') }}" name="selected_profile" id="selected_profile" method="POST" style="display: none;">

    </form>      
    <script>
        function cambiarPerfil(selectedProfile) {
            // Aquí puedes realizar una solicitud AJAX para enviar la selección al servidor
            // Realizar una solicitud AJAX
            $.ajax({
              type: "PUT",
            url: "{{ route('perfil.update') }}", // Ruta de Laravel
                data: { selected_profile: selectedProfile },
                success: function () {
                    // Recargar la página después de que la solicitud AJAX haya tenido éxito
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", error);
                    // Manejar el error según sea necesario
                }
            });
            // y actualizar la base de datos sin recargar la página
            // Pero por simplicidad, estamos utilizando un formulario para enviar la selección
            document.getElementById('selected_profile').value = selectedProfile;
            document.getElementById('profile_form').submit();
        }
    </script>

    <script>
        // Aquí puedes cambiar los nombres de las funciones si es necesario
        function perfil1() {
            cambiarPerfil('perfil1');
        }

        function perfil2() {
            cambiarPerfil('perfil2');
        }

        function perfil3() {
            cambiarPerfil('perfil3');
        }

        function perfil4() {
            cambiarPerfil('perfil4');
        }

        function perfil5() {
            cambiarPerfil('perfil5');
        }

        function perfil6() {
            cambiarPerfil('perfil6');
        }
    </script> 
   <!--<script>
        // Aquí puedes cambiar los nombres de las funciones si es necesario
        function perfil1() {
            cambiarPerfil('perfil1');
        }

        function perfil2() {
            cambiarPerfil('perfil2');
        }

        function perfil3() {
            cambiarPerfil('perfil3');
        }

        function perfil4() {
            cambiarPerfil('perfil4');
        }

        function perfil5() {
            cambiarPerfil('perfil5');
        }

        function perfil6() {
            cambiarPerfil('perfil6');
        }
    </script>
    <script>
    function cambiarPerfil(selectedProfile) {
        // Realizar una solicitud AJAX a la ruta de Laravel
        $.ajax({
            type: "PUT",
            url: "{{ route('perfil.update') }}", // Ruta de Laravel
            data: { selected_profile: selectedProfile },
            success: function () {
                // Recargar la página después de que la solicitud AJAX haya tenido éxito
                location.reload();
            },
            error: function (xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
                // Manejar el error según sea necesario
            }
        });
    }
</script> -->
@endsection
