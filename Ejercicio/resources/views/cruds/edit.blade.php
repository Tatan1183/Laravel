<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inscripción</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; 
            display: flex;
            justify-content: center; 
            align-items: flex-start;
            padding-top: 50px;
            margin: 0;
        }

        .container {
            background-color: #fff; 
            padding: 30px;
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
            border-bottom: 2px solid #007bff; 
            padding-bottom: 10px;
        }

        label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: white;
        }

        button[type="submit"]:hover {
            background-color: #1e7e34;
        }

        .btn-back {
            margin-top: 5px;
                        width: 100%;

            background-color: #007bff;
            color: white;
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Editar Inscripción</h1>
        
        <form method="POST" action="{{ route('usuarios.update', $usuario->codigo) }}">
            @csrf 
            @method('PUT')
            
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo" value="{{ $usuario->codigo }}" readonly>
            
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $usuario->nombre }}" required>
            
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="{{ $usuario->correo }}" required>
            
            <button type="submit">Actualizar</button>
        </form>

        <!-- Botón para volver al Index -->
        <a href="{{ route('usuarios.index') }}" class="btn-back">
            <button type="button" class="btn-back">Volver al listado</button>
        </a>
    </div>

</body>
</html>