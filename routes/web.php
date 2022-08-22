<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitantesController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\CadastroController;
use App\Models\Visitante;

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

//CADASTRO

Route::get('/', [CadastroController::class, 'show'])
->name('cadastro');
Route::post('/cadastrados', [CadastroController::class, 'store'])
->name('cadastrados');


Route::get('/solicitacao', [VisitantesController::class, 'show2'])
->name('solicitacao');


Route::get('/historico', [CadastroController::class, 'show'])
->name('historico');

//VISITANTES

Route::get('/historico/visitante', [VisitantesController::class, 'show'])
->name('visitante');
Route::post('/visitantes', [VisitantesController::class, 'store'])
->name('visitantes');

