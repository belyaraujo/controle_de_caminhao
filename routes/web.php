<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitantesController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\CadastroController;
// use App\Models\Visitante;

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


// Cadastro
Route::get('/', [CadastroController::class, 'show'])
->name('cadastro');

Route::post('/cadastrados', [CadastroController::class, 'store'])
->name('cadastrados');

// Visitantes
Route::get('/solicitacao', [VisitantesController::class, 'show2'])
->name('solicitacao');

Route::post('/visitantes', [VisitantesController::class, 'store'])
->name('visitantes');

// Histórico
Route::get('/historico', [HistoricoController::class, 'show'])
->name('historico');

Route::get('/historico/visitante', [HistoricoController::class, 'show'])
->name('visitante');