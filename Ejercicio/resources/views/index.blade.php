<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Inscritos</title>
    
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }

        header {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between; /* Alinea el título y el botón en extremos opuestos */
            align-items: center;
        }

        h1 {
            color: #333;
        }

        /* Estilo del botón 'Nueva inscripción' */
        .button-new {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button-new:hover {
            background-color: #0056b3;
        }

        /* Estilos de la tabla */
        table {
            width: 100%;
            border-collapse: collapse; /* Elimina los bordes dobles de las celdas */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        /* Encabezados de la tabla */
        th {
            background-color: #007bff;
            color: white;
            padding: 12px 15px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }

        /* Celdas de datos */
        td {
            padding: 10px 15px;
            border-bottom: 1px solid #eee;
        }

        /* Efecto cebra: da color a las filas pares para mejorar la lectura */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Estilo al pasar el ratón por la fila */
        tr:hover {
            background-color: #e0f7ff;
        }

        /* Estilos para la columna de acciones (botones) */
        .actions {
            white-space: nowrap; /* Mantiene los botones en una sola línea */
        }

        /* Estilo del enlace 'Editar' */
        .button-edit {
            color: #28a745; /* Verde */
            text-decoration: none;
            margin-right: 10px;
            font-weight: bold;
        }

        .button-edit:hover {
            text-decoration: underline;
        }

        /* Estilo del formulario de eliminar para mostrarlo en línea */
        .form-delete {
            display: inline;
        }

        /* Estilo del botón 'Eliminar' */
        .button-delete {
            background: none;
            border: none;
            padding: 0;
            margin: 0;
            cursor: pointer;
            color: #dc3545; /* Rojo */
            font-weight: bold;
            text-decoration: underline;
        }

        .button-delete:hover {
            color: #bd2130;
        }
    </style>
</head>
<body>

    <header>
        <h1>Lista de Inscritos</h1>
        <a href="{{ route('usuarios.create') }}" class="button-new">Nueva inscripción</a>
    </header>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->codigo }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->correo }}</td>
                <td class="actions">
                    <a href="{{ route('usuarios.edit', $usuario) }}" class="button-edit">Editar</a>
                    <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="form-delete">
                        @csrf @method('DELETE')
                        <button type="submit" class="button-delete">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>