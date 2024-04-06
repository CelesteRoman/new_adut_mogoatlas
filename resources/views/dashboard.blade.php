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
    </style>

    @include('layouts.menu')
    @parent
@endsection

@section('content')
    <div class="page-title">
        <!--Fin-->
        <div id="datatable_filter" class="dataTables_filter">
            <label>Buscar
                <input class="form-control input-sm" type="search" placeholder="" aria-controls="datatable">
            </label>
        </div>
        <!--Fin-->
        <div class="title_left">
            <!--<h3>Dashboard</h3>-->
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row top_tiles">
        @if(Auth::user()->rol->rol == 'Administrador')
            <h3>Dashboard Administrador</h3>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <br>
                <!-- Inicio -->
                <div class="card">
                    <div class="card-body">
                        <a href="archivos/1/Dobot-Blockly-Workbook.pdf" type="application/pdf" target="_blank">
                            <img src="images/1/libro_dobot.jpeg" class="img-fluid" id="pdfImage" width="60%" height="60%"  alt="No" />
                        </a>
                    </div>
                    <!-- Descripción del PDF -->
                    <div class="card-footer text-center">
                        <h1> Descripción del PDF </h1>
                    </div>
                </div>
                <!-- Fin -->
            </div>
        @endif

        @if(Auth::user()->rol->rol == 'Alumno')
            <h3> Dashboard Alumno</h3>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <br>
                <!-- Inicio -->
                <div class="card">
                    <div class="card-body">
                        <a href="archivos/1/Dobot-Blockly-Workbook.pdf" type="application/pdf" target="_blank">
                            <img src="images/1/libro_dobot.jpeg" class="img-fluid" id="pdfImage" width="60%" height="60%"  alt="No" />
                        </a>
                    </div>
                    <!-- Descripción del PDF -->
                    <div class="card-footer text-center">
                        <h1> Descripción del PDF </h1>
                    </div>
                </div>
                <!-- Fin -->
            </div>
        @endif

        @if(Auth::user()->rol->rol == 'Maestro')
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <h3>Dashboard Docente</h3>
                <br>
            </div>
            <!--  inicio -->
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="count">
                    <pre> <a href="archivos/1/Dobot-Blockly-Workbook.pdf" type="application/pdf" id="pdfLink" width="100%" height="600px">
                        <img src="images/1/libro_dobot.jpeg" id="pdfImage" width="60%" height="500px" alt="No" />
                    </a> </pre>
                </div>
                <!--Fin-->
            </div>
        @endif
    </div>
@endsection
