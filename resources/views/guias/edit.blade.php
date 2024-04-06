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
                <h2 class="text-center mb-4">Editar Guia</h2>
                <form method="POST" action="{{ route('guias.update', $guias->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Titulo">Título del Libro:</label>
                        <input type="text" name="Titulo" class="form-control" id="Titulo" value="{{ $guias->Titulo }}">
                    </div>
                    <div class="form-group">
    <label for="id_autor">Autor:</label>
    <select name="id_autor" class="form-control" id="id_autor">
        @foreach($autores as $autor)
            <option value="{{ $autor->_id }}" {{ $guias->id_autor == $autor->_id ? 'selected' : '' }}>
                {{ $autor->nombre }} {{ $autor->ape_paterno }} {{ $autor->ape_materno }}
            </option>
        @endforeach
    </select>
</div>

                    <div class="form-group">
                        <label for="id_estatus">Estatus:</label>
                        <input type="text" name="id_estatus" class="form-control" id="id_estatus" value="{{ $guias->id_estatus }}">
                    </div>
            
                    <button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
