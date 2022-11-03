<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Visitante;
use App\Models\Relatorio2;
use PDF;
use Maatwebsite\Excel\Facades\CSV;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Relatorio2Export;

class Relatorio2Controller extends Controller{

public function relatorio2(Request $request){

 $placa = Visitante::orderby('id')->get();

 //pode dar erro aqui!!! na parte do 'id'
 $solicitacao = Visitante::where('placa', '=', $request->id_placa)
 ->wherebetween('created_at', [$request->datainicial . '00:00:00', $request->datafinal . '23:59:59']);


 return view('relatorio2', compact('placa'));


}

public function Docs(Request $request ){

$option = $request->documentos;

$placa = $request->input('id_placa');
$datainicial = $request->input('datainicial');
$datafinal = $request->input('datafinal');

if($option == 1){

//PODE DAR ERRO AQUI!!!

$solicitacao = Visitante::where('placa', $placa)
->wherebetween('created_at', [$datainicial . ' 00:00:00', $datafinal . ' 23:59:59'])->get();

$relatorio = [

    'title' => 'Relatório',
    'date' => date('d/m/Y'),
    'solicitacao' => $solicitacao,

];

 $pdf = PDF::loadview('myPDF2', $relatorio);

 return $pdf->stream('relatorio.pdf');

}

if($option == 2)
{
    return Excel::download(new Relatorio2Export($placa, $datainicial, $datafinal), 'relatorio.xlsx');
}

if($option == 3)
{
    return Excel::download(new Relatorio2Export($placa, $datainicial, $datafinal), 'relatorio.csv');
}

}
}