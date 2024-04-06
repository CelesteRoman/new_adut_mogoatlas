<!DOCTYPE html>
<html lang="en"> 
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard ADUT</title>
    <!-- Bootstrap / arriba css -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <link href="{{ asset('vendors/google-code-prettify/bin/prettify.min.css') }}" rel="stylesheet">    
    <!-- Select2 -->
    <link href="{{ asset('vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">    
    <!-- Switchery -->
    <link href="{{ asset('vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">    
    <!-- starrr -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">    
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/starrr/dist/starrr.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>

    <!-- Plugin calendarios -->

    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="{{ asset('vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="{{ asset('vendors/normalize-css/normalize.css')}}" rel="stylesheet">
    <link href="{{ asset('vendors/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <link href="{{ asset('vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="{{ asset('vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">

    <link href="{{ asset('vendors/cropper/dist/cropper.min.css')}}" rel="stylesheet">
    
    <!-- Fin de plugins Calendario -->    

    <!-- Datatables -->
    <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

    <!-- jQuery custom content scroller -->
    <link href="{{ asset('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('vendors/build/css/custom.min.css') }}" rel="stylesheet">

    <style>
  .mCustomScrollBox, .profile , .mCSB_container , .site_title , .menu_section ,  .left_col , .nav_menu , .pull-righ {
    background-color: #006E66 !important;
  }

  .mCustomScrollBox, .profile , .mCSB_container , .menu_section ,   .left_col , .nav_menu , .pull-righ {
	background-color: #006E66 !important;
  }

  .right_col  {
    background-color:#f4e9cd !important;
  }
</style>

  </head>

  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('/dashboard') }}" class="site_title">&nbsp;<span>INICIO ADUT</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <!-- Sección de la foto de perfil grande del usuario -->
            
              <div  class="profile_pic">
                  <img class="img-circle profile_img" src="{{ asset('images/foto_perfil/' . Auth::user()->ruta_perfil . '.png') }}" alt="User-Profile-Image" height="10%" width="5%">
              </div>
           
              <!-- Fin de la foto de perfil grande del usuario src="images/1/libro_dobot.jpeg" -->
              <div class="profile_info">
                <span>Bienvenido,</span>                
                <h2>{{ Auth::user()->name }}</h2>                
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                @yield('sidebar')
              </div>  
            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img class="img-circle profile_img" 
                    src="{{ asset('images/foto_perfil/' . Auth::user()->ruta_perfil . '.png') }}" 
                    alt="User-Profile-Image" 
                    style="height: 35px; width: 35px; object-fit: cover; border-radius: 50%;">
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{ route('perfil.index')}}"> Perfil</a></li>
                    <li><a href="{{ route('logout') }}" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">                                                          
                    <i class="fa fa-sign-out pull-right"></i>{{ __('Salir') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                    </form>                  
                  </li>
                  </ul>
                </li>

                <!-- <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">1</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="{{asset('/images/amarillo_img.jpeg')}}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 minutos atras</span>
                        </span>
                        <span class="message">
                          Bienvenido !!!
                        </span>
                      </a>
                    </li>
                  </ul>
                </li> -->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            @yield('content')
          </div>  
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Adaptado para ADUT, por el equipo de desarrollo adut
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <!--<script src="../vendors/nprogress/nprogress.js"></script>-->
    <script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>    
    <!-- Chart.js -->
    <script src="{{ asset('vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <!--<script src="../vendors/gauge.js/dist/gauge.min.js"></script>-->
    <!-- bootstrap-progressbar -->
    <!--<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>-->
    <script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>    
    <!-- iCheck -->
    <script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <!--<script src="../vendors/skycons/skycons.js"></script>-->
    <!-- Flot -->
    <!--<script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>-->
    <!-- Flot plugins -->
    <!--<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>-->
    <!-- DateJS -->
    <!--<script src="../vendors/DateJS/build/date.js"></script>-->
    <!-- JQVMap -->
    <script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <!--<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>-->

    <!-- Inicio de plugins Calendario -->
    <!-- bootstrap-daterangepicker -->
    <!--<script src="../vendors/moment/min/moment.min.js"></script>-->
    <script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>   
    <script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
     <!-- bootstrap-datetimepicker -->    
     <script src="{{ asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Ion.RangeSlider -->
    <script src="{{ asset('vendors/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="{{ asset('vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Fin de plugins Calendario -->


    <!-- bootstrap-wysiwyg -->
    <script src="{{ asset('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>   
    <script src="{{ asset('vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>   
    <script src="{{ asset('vendors/google-code-prettify/src/prettify.js') }}"></script>   
    <!-- jQuery Tags Input -->
    <script src="{{ asset('vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>      
    <!-- Switchery -->
    <script src="{{ asset('vendors/switchery/dist/switchery.min.js') }}"></script>      
    <!-- Select2 -->
    <script src="{{ asset('vendors/select2/dist/js/select2.full.min.js') }}"></script>      
    <!-- Parsley -->
    <script src="{{ asset('vendors/parsleyjs/dist/parsley.min.js') }}"></script>      
    <!-- Autosize -->
    <script src="{{ asset('vendors/autosize/dist/autosize.min.js') }}"></script>      
    <!-- jQuery autocomplete -->
    <script src="{{ asset('vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
    <!-- starrr -->
    <script src="{{ asset('vendors/starrr/dist/starrr.js') }}"></script>         
    <!-- Custom Theme Scripts -->
    <!-- Datatables -->
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    
    <script src="{{ asset('vendors/build/js/custom.min.js') }}"></script>
    
    <script type="text/javascript">

        //INICIO - DataTables
        $('#datatable').DataTable( {
            language: {
                processing:     "Procesando...",
                search:         "Buscar",
                lengthMenu:     "Mostrar _MENU_ registros",
                info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                infoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
                infoFiltered:   "(filtrado de un total de _MAX_ registros)",
                infoPostFix:    "",
                loadingRecords: "Cargando...",
                zeroRecords:    "No se encontraron resultados",
                emptyTable:     "Ninguna información registrada",
                paginate: {
                    first:      "Primero",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Último"
                },
                aria: {
                    sortAscending:  ": Activar para ordenar la columna de manera ascendente",
                    sortDescending: ": Activar para ordenar la columna de manera descendente"
                }
            }
        } ); 
        //FIN - DataTables

        $('#fechaInicio2').datetimepicker({
            format: 'DD/MM/YYYY'
        });
        
        $('#fechaFin2').datetimepicker({
            format: 'DD/MM/YYYY'
        });

    </script>    

    @stack('jscustom');
  </body>
</html>
