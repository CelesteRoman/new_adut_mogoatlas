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
        .form-group input[type="number"],
        .form-group input[type="file"],
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
                <h2 class="text-center mb-4">Agregar Nuevo Articulo</h2>
                <form method="POST" action="{{ route('articulos.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="Titulo">Título del Articulo:</label>
                        <input type="text" name="Titulo" class="form-control" id="Titulo" placeholder="Título del Articulo">
                    </div>
                    <div class="form-group">
                        <label for="id_tipo_documento">Tipo de Documento:</label>
                        <select name="id_tipo_documento" id="id_tipo_documento" class="form-control">
                            @foreach ($tipoDocumentos as $tipoDocumento)
                                <option value="{{ $tipoDocumento->id }}">{{ $tipoDocumento->tipo_documento }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_autor">Autor:</label>
                        <select name="id_autor" id="id_autor" class="form-control">
                            @foreach ($autores as $autor)
                                <option value="{{ $autor->id }}">{{ $autor->nombre }} {{ $autor->ape_paterno }} {{ $autor->ape_materno }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_genero">Género:</label>
                        <select name="id_genero" id="id_genero" class="form-control">
                            @foreach ($generos as $genero)
                                <option value="{{ $genero->id }}">{{ $genero->tipo_genero}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_editorial">Editorial:</label>
                        <select name="id_editorial" id="id_editorial" class="form-control">
                            @foreach ($editorial as $editorial)
                                <option value="{{ $editorial->id }}">{{ $editorial->nombre_editorial }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_carrera">Carrera:</label>
                        <select name="id_carrera" id="id_carrera" class="form-control">
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}">{{ $carrera->carrera }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="anno_publicacion">Año de Publicación:</label>
                        <input type="text" name="anno_publicacion" class="form-control" id="anno_publicacion" placeholder="Año de Publicación">
                    </div>
                    <div class="form-group">
                        <label for="fecha_adquisicion">Fecha de Adquisición:</label>
                        <input type="text" name="fecha_adquisicion" class="form-control" id="fecha_adquisicion" placeholder="Fecha de Adquisición">
                    </div>
                    <div class="form-group">
                        <label for="estatus">Estatus:</label>
                        <input type="text" name="estatus" class="form-control" id="estatus" placeholder="Estatus">
                    </div>

                    <div class="form-group">
                        <label for="ruta_ubicacion">Imagen del Libro:</label>
                        <input type="file" name="ruta_ubicacion" class="form-control-file" id="ruta_ubicacion">
                    </div>
                    <div class="form-group">
                        <label for="ruta_portada">Archivo del Libro:</label>
                        <input type="file" name="ruta_portada" class="form-control-file" id="ruta_portada">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Agregar Libro</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
