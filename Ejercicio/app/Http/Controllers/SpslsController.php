<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpslsController extends Controller
{
    // Define las reglas del juego en un array asociativo
    private $rules = [
        'tijera' => ['corta papel', 'decapita lagarto'],
        'papel' => ['cubre piedra', 'desautoriza Spock'],
        'piedra' => ['aplasta lagarto', 'aplasta tijera'],
        'lagarto' => ['envenena Spock', 'devora papel'],
        'spock' => ['rompe tijera', 'vaporiza piedra']
    ];

    /**
     * Muestra la vista del juego con el historial.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $historial = $request->session()->get('historial', []);
        return view('juego-spsls', ['historial' => $historial]);
    }

    /**
     * Procesa la jugada del usuario, determina el resultado y lo guarda en el historial.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function play(Request $request)
    {
        $jugadas = ['piedra', 'papel', 'tijera', 'lagarto', 'spock'];

        // Jugada del usuario
        $usuario = $request->input('jugada');

        // Jugada de la PC
        $pc = $jugadas[array_rand($jugadas)];

        // Determinar el resultado
        $resultado = $this->determinarResultado($usuario, $pc);

        // Almacenar en el historial de sesión
        $historial = $request->session()->get('historial', []);
        $historial[] = [
            'usuario' => $usuario,
            'pc' => $pc,
            'resultado' => $resultado,
        ];
        $request->session()->put('historial', $historial);

        // Redirigir de vuelta a la página con los datos
        return redirect()->route('spsls.index')->with([
            'resultado' => $resultado,
            'usuario' => $usuario,
            'pc' => $pc,
        ]);
    }

    /**
     * Lógica para determinar el ganador del juego.
     *
     * @param string $jugadaUsuario
     * @param string $jugadaPC
     * @return string
     */
    private function determinarResultado($jugadaUsuario, $jugadaPC)
    {
        if ($jugadaUsuario === $jugadaPC) {
            return "¡Empate!";
        }

        foreach ($this->rules[$jugadaUsuario] as $rule) {
            if (str_contains($rule, $jugadaPC)) {
                return "¡Ganaste!";
            }
        }

        return "¡Perdiste!";
    }
}