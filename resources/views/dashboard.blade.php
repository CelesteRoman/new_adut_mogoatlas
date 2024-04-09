@extends('layouts.appfront')

@section('sidebar')
    <!-- Heredamos con parent lo que hay en la plantilla base pero añadimos otro elemento al menú -->
    <style>
        .card-footer {
            display: none;
        }

        .card:hover .card-footer {
            display: block;
        }

        /* Agrega un margen entre las cards */
        .card {
            margin-bottom: 20px;
        }

        /* Ajusta el tamaño de las imágenes */
        .card img {
            max-width: 100%;
            height: auto;
        }
    </style>
     <link rel="stylesheet" href="styles.css">

    @include('layouts.menu')
    @parent
@endsection

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Seleccion de libros</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div id="pdf-container">

    <!--  <div class="container">
       
        <img src="imagen2.jpg" id="imagen2" class="imagen" data-pdf="pdf2.pdf">
       Agrega más imágenes según sea necesario
    </div> -->

   

        <div class="row top_tiles align-items-center">
            @if(Auth::user()->rol->rol == 'Administrador' || Auth::user()->rol->rol == 'Maestro'|| Auth::user()->rol->rol == 'Alumno')
                <!-- Inicio de la primera fila de cards <img id="imagen1" src="ruta_a_tu_imagen.jpg" alt="Imagen 1" "> -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('leer.index') }}"  type="application/pdf"  target="_blank" >
                                <img   id="1" src="images/1/libro_dobot.jpeg" alt="Imagen 1"  alt="No" />
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Inicio de la primera fila de cards -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('leerMemoria.index') }}" type="application/pdf" target="_blank">
                                <img id="2"  src="images/1/Educacion_en_gastronomia_su_vinculo_con_la_identidad_cultural_y_el_turismo.png" class="img-fluid" id="pdfImage3" alt="No" />
                               
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('leerGuia.index') }}" type="application/pdf" target="_blank">
                                <img id="3" src="images/1/portada_new.png" class="img-fluid" id="pdfImage3" alt="No" />
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Agrega más cards aquí -->
                
                             @endif
                            </div>
                            </div>
@endsection
