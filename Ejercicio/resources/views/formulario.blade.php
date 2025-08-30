<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <title>Formulario MVC Laravel</title>
</head>
<body>
 <h1>Enviar datos</h1>
<form action="{{ route('form.store') }}" method="POST">
    @csrf
    <label>Nombre:</label>
    <input type="text" name="nombre"><br><br>
    <label>Correo:</label>
    <input type="email" name="correo"><br><br>
    <button type="submit">Enviar</button>
</form>
