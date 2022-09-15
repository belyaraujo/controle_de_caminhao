<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cadastro;
use App\Models\Visitante;
use App\Models\Relatorio;
use PDF;
use Maatwebsite\Excel\Facades\xlsx;
use Maatwebsite\Excel\Facades\CSV;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RelatorioExport;



class RelatorioController extends Controller
{

  public function relatorio(Request $request)
  {
    $placa = Cadastro::orderby('id')->get();


    $solicitacao = Cadastro::where('id_placa', '=', $request->id_placa)
      ->whereBetween('created_at', [$request->datainicial . '00:00:00', $request->datafinal . '23:59:59'])->get();




    return view('relatorio', compact('placa','solicitacao'));
  }



  public function Docs(Request $request)
  {

    $option = $request->documentos;

    $placa = $request->input('id_placa');
    $datainicial = $request->input('datainicial');
    $datafinal = $request->input('datafinal');

    if ($option == 1) {

      //PDF

      $placa = Cadastro::where('id_placa', $placa)
        ->whereBetween('created_at', [$datainicial . ' 00:00:00', $datafinal . ' 23:59:59'])
        ->get();

        $solicitacao = Cadastro::where('id_placa', '=', $request->placa)
      ->whereBetween('created_at', [$request->datainicial . '00:00:00', $request->datafinal . '23:59:59']);


      $relatorio = [
        'title' => 'Relatório',
        'date' => date('d/m/Y'),
        'placa' => $placa,
        'solicitacao' => $solicitacao,
      ];


      $pdf = PDF::loadView('myPDF', $relatorio);
      return $pdf->stream('relatorio.pdf');
    }
    if ($option == 2) {

      //XLS
      $placa = Cadastro::where('id_placa', $placa)
      ->whereBetween('created_at', [$datainicial . ' 00:00:00', $datafinal . ' 23:59:59'])
      ->get();

      $solicitacao = Cadastro::where('id_placa', '=', $request->placa)
    ->whereBetween('created_at', [$request->datainicial . '00:00:00', $request->datafinal . '23:59:59']);


    $relatorio = [
      'title' => 'Relatório',
      'date' => date('d/m/Y'),
      'placa' => $placa,
      'solicitacao' => $solicitacao,
    ];

    //print_r("oi");
      return Excel::download(new RelatorioExport($placa, $datainicial, $datafinal), 'relatorio.xlsx');
    }
    
    if ($option == 3) {

      //CVS

      return Excel::download(new RelatorioExport($placa, $datainicial, $datafinal), 'relatorio.csv');
    }
  }
}