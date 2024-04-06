<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos del formulario */
        body {
            background-color: #F9E4B7;
        }

        .container {
            margin-top: 50px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-container">
                <h2 class="text-center mb-4">Editar Memoria</h2>
                <form method="POST" action="{{ route('memorias.update', $memoria->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Titulo">Título:</label>
                        <input type="text" name="Titulo" class="form-control" id="Titulo" value="{{ $memoria->Titulo }}">
                    </div>
                


                    <div class="form-group">
                        <label for="id_autor">Autor:</label>
                        <select name="id_autor" class="form-control" id="id_autor">
                            @foreach($autores as $autor)
                                <option value="{{ $autor->_id }}" {{ $memoria->id_autor == $autor->_id ? 'selected' : '' }}>
                                    {{ $autor->nombre }} {{ $autor->ape_paterno }} {{ $autor->ape_materno }}
                                </option>
                            @endforeach
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label for="empresa">Empresa:</label>
                        <input type="text" name="empresa" class="form-control" id="empresa" value="{{ $memoria->empresa }}">
                    </div>
                    <div class="form-group">
                        <label for="fecha_adquisicion">Fecha de Adquisición:</label>
                        <input type="text" name="fecha_adquisicion" class="form-control" id="fecha_adquisicion" value="{{ $memoria->fecha_adquisicion }}">
                    </div>
                    <div class="form-group">
                        <label for="anno_publicacion">Año de Publicación:</label>
                        <input type="text" name="anno_publicacion" class="form-control" id="anno_publicacion" value="{{ $memoria->anno_publicacion }}">
                    </div>
                    <div class="form-group">
                        <label for="estatus">Estatus:</label>
                        <input type="text" name="estatus" class="form-control" id="estatus" value="{{ $memoria->estatus }}">
                    </div>
                    <div class="form-group">
                        <label for="imagen_memoria">Imagen de la Memoria:</label>
                        <input type="file" name="imagen_memoria" class="form-control-file" id="imagen_memoria">
                    </div>
                    <div class="form-group">
                        <label for="archivo_memoria">Archivo de la Memoria:</label>
                        <input type="file" name="archivo_memoria" class="form-control-file" id="archivo_memoria">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
