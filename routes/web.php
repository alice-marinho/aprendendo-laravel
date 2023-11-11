<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\EventController;

# Mostrando todos os registros (index)
Route::get('/', [EventController::class, 'index'] );

# Criar um evento (create)
Route::get('/events/create', [EventController::class, 'create'] )-> middleware('auth'); 
# Middleware faz algo entre a entrega da view, neste caso ele priva alguem de criar eventos caso não seja cadastrado (auth)

# Rota para mostrar (show) o evento criado
Route::get('/events/{id}', [EventController::class, 'show'] );

# Método store onde envia os dados para o banco
Route::post('/events',[EventController::class,'store']);

# Route::get('/events/entrar', [EventController::class, 'login']  );
# Route::get('/events/cadastro', [EventController::class, 'register']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
