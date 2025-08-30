<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\FormController;
Route::get('/form', [FormController::class, 'create']);
Route::post('/form', [FormController::class, 'store'])->name('form.store');



use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| Ruta para mostrar el juego
|--------------------------------------------------------------------------
| Cuando el usuario entra a /ppt por GET, se llama al método "index"
| del GameController, el cual simplemente devuelve la vista del juego
| (es decir, muestra los botones piedra, papel y tijeras).
|
*/
Route::get('/ppt', [GameController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Ruta que procesa la jugada
|--------------------------------------------------------------------------
| En esta ruta se recibe el formulario por POST desde el juego.
| Se llama al método "play" del GameController, que compara la jugada del
| usuario con la de la PC y devuelve el resultado. Se usa "ppt.play"
| como nombre simbólico de la ruta para referenciarla desde el formulario.
|
*/
Route::post('/ppt', [GameController::class, 'play'])->name('ppt.play');

use App\Http\Controllers\SpslsController; // Importa el nuevo controlador

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rutas para el juego Piedra, Papel, Tijera, Lagarto, Spock (SPSLS)
Route::get('/spsls', [SpslsController::class, 'index'])->name('spsls.index');
Route::post('/spsls', [SpslsController::class, 'play'])->name('spsls.play');