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
Route::get('/events/create', [EventController::class, 'create'] );

# Rota para mostrar (show) o evento criado
Route::get('/events/{id}', [EventController::class, 'show'] );

# Método store onde envia os dados para o banco
Route::post('/events',[EventController::class,'store']);

Route::get('/events/entrar', [EventController::class, 'login']  );
Route::get('/events/cadastro', [EventController::class, 'register']);
