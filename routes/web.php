<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\CadastradosController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\Relatorio2Controller;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\LoginController;



//Administradores

Route::group(['middleware' => ['admin', 'auth.session']], function() {

    //CADASTRADOS
    Route::get('/', [CadastradosController::class, 'placa'])->middleware(['auth'])
    ->name('cadastro');
    Route::post('/cadastrados', [CadastradosController::class, 'store'])
    ->name('cadastrados');
    
    //CADASTRO
    Route::get('/cadastro', [CadastroController::class, 'show2'])
    ->name('solicitacao');
    
    
    Route::get('/historico', [HistoricoController::class, 'show'])
    ->name('historico');
    
    Route::post('/historico/{id}', [HistoricoController::class,'update'])
    ->name('atualizar');
    
    //VISITANTES
    
    Route::get('/historico/visitante', [CadastroController::class, 'show'])
    ->name('visitante');

    Route::post('/historico/visitante/{id}', [CadastroController::class,'update'])
    ->name('atualizar2');

    Route::post('/visitantes', [CadastroController::class, 'store'])
    ->name('visitantes');


    
    Route::get('/relatorio', [RelatorioController::class, 'relatorio'])->name('relatorio');
    Route::get('/relatorio/visitante', [Relatorio2Controller::class, 'relatorio2'])->name('relatorio.visitante');
    
    Route::get('/generate-pdf', [RelatorioController::class, 'Docs'])->name('gera-pdf');
    Route::get('/generate-pdf2', [Relatorio2Controller::class, 'Docs'])->name('gera-pdf2');
    Route::get('/test', [LoginController::class, 'authenticate'])->name('login')->middleware(['auth']);

});

//USUARIOS

Route::group(['middleware' => ['client', 'auth.session']], function() {

    Route::get('/', [CadastradosController::class, 'placa'])
    ->name('cadastro');
    Route::post('/cadastrados', [CadastradosController::class, 'store'])
    ->name('cadastrados');

//CADASTRO
Route::get('/cadastro', [CadastroController::class, 'show2'])
->name('solicitacao');


Route::get('/historico', [HistoricoController::class, 'show'])
->name('historico');

Route::post('/historico/{id}', [HistoricoController::class,'update'])
->name('atualizar');

//VISITANTES
    
Route::get('/historico/visitante', [CadastroController::class, 'show'])
->name('visitante');

Route::post('/historico/visitante/{id}', [CadastroController::class,'update'])
->name('atualizar2');

Route::post('/visitantes', [CadastroController::class, 'store'])
->name('visitantes');



});

require __DIR__.'/auth.php';



Route::get('/acesso', function () {
    return view('SemAcesso');
});




//CADASTRADOS

/*Route::get('/', [CadastradosController::class, 'placa'])->middleware(['auth'])
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
Route::get('/test', [LoginController::class, 'test'])->middleware(['admin']);

//Route::get('/welcome', [RelatorioController::class, 'Docs'])->name('gera-pdf');*/

//gera-pdf


//Route::get('/dashboard', function () {
    //dd("alo");
//})->middleware(['auth'])->name('dashboard');



