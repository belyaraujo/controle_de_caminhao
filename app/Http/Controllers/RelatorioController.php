<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Placa;
use App\Models\Cadastro;
use App\Models\Relatorio;
use PDF;
use Maatwebsite\Excel\Facades\CSV;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RelatorioExport;



class RelatorioController extends Controller
{
 
   public function relatorio(Request $request){
    
    $placa = Placa::orderby('id')->get();
 
      $cadastro = Cadastro::where('id_placa', '=', $request->id_placa)
      ->whereBetween('created_at', [$request->datainicial . ' 00:00:00', $request->datafinal . ' 23:59:59']);
    

      return view('relatorio', compact('placa'));


}

public function Docs(Request $request){

  $option = $request->documentos;

  $id_placa = $request->input('id_placa');
  $datainicial = $request->input('datainicial');
  $datafinal = $request->input('datafinal');

       //PDF

  if($option == 1){
    $cadastro = Cadastro::where('id_placa', $id_placa)
    ->whereBetween('created_at', [$datainicial . ' 00:00:00', $datafinal . ' 23:59:59'])->get();

    $relatorio = [
      'title' => 'Relatório',
      'date' => date('d/m/Y'),
      'cadastro' => $cadastro, 
    ];

    $pdf = PDF::loadView('myPDF', $relatorio);
    return $pdf->stream('relatorio.pdf');

}

     //XLS

if($option == 2){
  return Excel::download(new RelatorioExport($id_placa, $datainicial, $datafinal), 'relatorio.xlsx');
}

     //CVS

if ($option == 3) {
  return Excel::download(new RelatorioExport($id_placa, $datainicial, $datafinal), 'relatorio.csv');
}

}
}