<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\CadastradosController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\DocumentoController;

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

//CADASTRADOS

Route::get('/', [CadastradosController::class, 'placa'])
->name('cadastro');
Route::post('/cadastrados', [CadastradosController::class, 'store'])
->name('cadastrados');

//CADASTRO
Route::get('/cadastro', [CadastroController::class, 'show2'])
->name('solicitacao');


Route::get('/historico', [HistoricoController::class, 'show'])
->name('historico');

//VISITANTES

Route::get('/historico/visitante', [CadastroController::class, 'show'])
->name('visitante');
Route::post('/visitantes', [CadastroController::class, 'store'])
->name('visitantes');

Route::get('/relatorio', [RelatorioController::class, 'relatorio'])->name('relatorio');

Route::get('/generate-pdf', [RelatorioController::class, 'Docs'])->name('gera-pdf');
//Route::get('/welcome', [RelatorioController::class, 'Docs'])->name('gera-pdf');

//gera-pdf