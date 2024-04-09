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
                <h2 class="text-center mb-4">Nuevo Comentario</h2>
                <form method="POST" action="{{ route('comentarios.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="comentario">Contenido del Comentario:</label>
                        <textarea name="comentario" class="form-control" id="comentario" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="id_documento">ID del Documento:</label>
                        <input type="text" name="id_documento" class="form-control" id="id_documento" placeholder="ID del Documento">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Agregar Comentario</button>
                    <button href="{{ route('comentarios.index') }}" class="btn btn-primary btn-block">Regresar</button>
                 
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
