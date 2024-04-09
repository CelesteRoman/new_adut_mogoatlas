@extends('layouts.appfront')
  @section('sidebar')
  <!-- Heredamos con parent lo que hay en la plantilla base pero añadimos otro elemento al menú -->
    @include('layouts.menu')
    @parent
  @endsection

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leer libro</title>
    <script src="pdf.js"></script>
    <link rel="stylesheet" href="pdf_viewer.css">
    
</head>
<body>
  <div>
<div  id="pdf-container">
        <div class="button-container">
        <ul class="nav navbar-right panel_toolbox">
                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Regresar</a>
            </ul>
            <ul class="nav navbar-right panel_toolbox">
                <a href="{{Route('comentarios.index')}}" class="btn btn-primary">Comentarios</a>
            </ul>
            <ul class="nav navbar-right panel_toolbox">
                <a href="{{Route('comentarios.create')}}" class="btn btn-primary">Crear comentarios</a>
            </ul>
        </div> 
    
        <iframe src="{{asset('archivos/1/Dobot-Blockly-Workbook.pdf')}}" style="width:100%; height:750px;"></iframe>

    </div></div>  
     <!-- <script>

# En el archivo que contiene la etiqueta de imagen
imagen_id = obtener_id_de_imagen()  # Supongamos que esta función obtiene el ID de la imagen

# Enviar el ID de la imagen a otro archivo para la validación
if imagen_id == 1:
    abrir_pdf("archivos/1/Dobot-Blockly-Workbook.pdf")
elif imagen_id == 2:
    abrir_pdf("archivos/2/Educacion_en_gastronomia_su_vinculo_con_la_identidad_cultural_y_el_turismo.pdf")
else:
    mostrar_error("ID de imagen no válido")

# En el archivo donde se realiza la validación
def abrir_pdf(nombre_pdf):
    # Código para abrir el PDF especificado
    pass

def mostrar_error(mensaje):
    # Código para mostrar un mensaje de error
    pass

    </script> -->
 
</body>
</html>
@endsection
