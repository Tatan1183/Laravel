<?php

namespace App\Http\Controllers;

use App\Models\crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    // ================= API (JSON) =================

    // Muestra todos los registros de usuarios
    public function index()
    {
        $usuarios = crud::all();
        return response()->json($usuarios);
    }

    // Crea un nuevo registro con código, nombre y correo
    public function store(Request $request)
    {
        $usuario = crud::create($request->all());
        return response()->json($usuario, 201);
    }

    // Muestra un registro por código
    public function show($codigo)
    {
        $usuario = crud::findOrFail($codigo);
        return response()->json($usuario);
    }

    // Actualiza un registro
    public function update(Request $request, $codigo)
    {
        $usuario = crud::findOrFail($codigo);
        $usuario->update($request->all());
        return response()->json($usuario);
    }

    // Elimina un registro
    public function destroy($codigo)
    {
        $usuario = crud::findOrFail($codigo);
        $usuario->delete();
        return response()->json(null, 204);
    }


    // ================= VISTAS (Blade) =================

    // Muestra la vista con todos los usuarios
    public function vistaIndex()
    {
        $usuarios = Crud::all();
        return view('cruds.index', compact('usuarios'));
    }

    // Muestra el formulario de creación
    public function create()
    {
        return view('cruds.create');
    }

    // Guarda el usuario desde el formulario web
    public function storeWeb(Request $request)
    {
        Crud::create($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
    }

    // Muestra el formulario de edición
    public function edit($codigo)
    {
        $usuario = Crud::findOrFail($codigo);
        return view('cruds.edit', compact('usuario'));
    }

    // Actualiza el usuario desde el formulario web
    public function updateWeb(Request $request, $codigo)
    {
        $usuario = Crud::findOrFail($codigo);
        $usuario->update($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');
    }

    // Elimina el usuario desde la vista web
    public function destroyWeb($codigo)
    {
        $usuario = Crud::findOrFail($codigo);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }
}
