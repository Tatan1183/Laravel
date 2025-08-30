<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return view('juego');
    }

    /* Método que procesa cada jugada del usuario.
       Aquí se recibe la jugada enviada por POST y se genera una jugada aleatoria de la PC.
    */
    public function play(Request $request)
    {
        // Posibles opciones que hay en el juego
        $opciones = ['piedra','papel','tijeras'];

        // Jugada elegida por el usuario desde el formulario
        $usuario = $request->input('jugada');

        // Jugada aleatoria de la computadora
        $pc = $opciones[array_rand($opciones)];

        // ==========================
        // Lógica para determinar quién gana
        // ==========================
        if($usuario === $pc) {
            // Si ambos eligen lo mismo hay empate
            $resultado = '🤝 Empate';
        }
        // En caso contrario se evalúan todas las combinaciones donde gana el usuario
        elseif (
            ($usuario == 'piedra' && $pc == 'tijeras') ||
            ($usuario == 'papel' && $pc == 'piedra') ||
            ($usuario == 'tijeras' && $pc == 'papel')
        ) {
            $resultado = '🏆 ¡Ganaste!';
        }
        // Si no empató ni ganó, entonces pierde el usuario
        else {
            $resultado = '😢 Perdiste';
        }

        // Retornamos la misma vista 'juego', enviando variables a la vista:
        // - $usuario: la jugada del jugador
        // - $pc: la jugada de la computadora
        // - $resultado: texto con el resultado de la partida
        return view('juego', compact('usuario','pc','resultado'));
    }
}


