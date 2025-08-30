<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piedra, Papel, Tijeras, Lagarto, Spock</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

        :root {
            --background-color: #121212;
            --text-color: #e0e0e0;
            --primary-color: #bb86fc;
            --secondary-color: #03dac6;
            --button-bg-color: #2c2c2c;
            --button-hover-bg-color: #3f3f3f;
            --result-win-color: #4caf50;
            --result-lose-color: #f44336;
            --result-draw-color: #ffeb3b;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            flex-direction: column;
            text-align: center;
            padding: 20px;
        }

        .container {
            background-color: #1e1e1e;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 600px;
        }

        h2 {
            color: var(--primary-color);
            margin-bottom: 30px;
            font-size: 2.5em;
            letter-spacing: 1px;
        }
        
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }
        
        .buttons-container {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        button {
            background-color: var(--button-bg-color);
            color: var(--secondary-color);
            border: 2px solid var(--secondary-color);
            padding: 15px 30px;
            border-radius: 10px;
            font-size: 1.2em;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            width: 150px;
            justify-content: center;
        }

        button:hover {
            background-color: var(--button-hover-bg-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        button:active {
            transform: translateY(0);
        }

        .resultado {
            margin-top: 40px;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid var(--text-color);
        }

        .resultado h3, .resultado h2 {
            margin: 10px 0;
        }
        
        .resultado h2 {
            font-size: 2em;
            font-weight: bold;
        }

        .resultado strong {
            color: var(--primary-color);
        }
        
        .win {
            background-color: var(--result-win-color);
            color: var(--background-color);
        }
        
        .lose {
            background-color: var(--result-lose-color);
            color: var(--background-color);
        }
        
        .draw {
            background-color: var(--result-draw-color);
            color: var(--background-color);
        }
        
        .historial {
            margin-top: 30px;
            text-align: left;
        }

        .historial h3 {
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
        
        .historial ul {
            list-style-type: none;
            padding: 0;
        }

        .historial li {
            background-color: #2c2c2c;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Piedra, Papel, Tijeras, Lagarto, Spock</h2>

        <form action="{{ route('spsls.play') }}" method="POST">
            @csrf
            <label>Elige tu jugada:</label><br>

            <div class="buttons-container">
                <button type="submit" name="jugada" value="piedra">
                    🪨 Piedra
                </button>
                <button type="submit" name="jugada" value="papel">
                    📄 Papel
                </button>
                <button type="submit" name="jugada" value="tijera">
                    ✂️ Tijera
                </button>
                <button type="submit" name="jugada" value="lagarto">
                    🦎 Lagarto
                </button>
                <button type="submit" name="jugada" value="spock">
                    🖖 Spock
                </button>
            </div>
        </form>

        @isset($resultado)
            <div class="resultado
                @if ($resultado == '¡Ganaste!') win
                @elseif ($resultado == '¡Perdiste!') lose
                @else draw
                @endif
            ">
                <h3>Tu jugada: <strong>{{ $usuario }}</strong></h3>
                <h3>PC jugó: <strong>{{ $pc }}</strong></h3>
                <h2>{{ $resultado }}</h2>
            </div>
        @endisset
        
        @if (!empty($historial))
            <div class="historial">
                <h3>Historial de Jugadas</h3>
                <ul>
                    @foreach (array_reverse($historial) as $jugada)
                        <li>Tú: <strong>{{ $jugada['usuario'] }}</strong> | PC: <strong>{{ $jugada['pc'] }}</strong> | Resultado: <strong>{{ $jugada['resultado'] }}</strong></li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</body>
</html>