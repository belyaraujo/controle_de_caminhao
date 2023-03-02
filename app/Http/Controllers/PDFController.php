<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\HistoricoController;
use App\Models\Relatorio;
use App\Models\Visitantes;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        
       
        $relatorio = [
            'title' => 'Relatório de',
            'date' => date('d/m/Y'),
            
        ]; 
            
        $pdf = PDF::loadView('myPDF', $relatorio);
     
        return $pdf->stream('relatorio.pdf');
    }
}