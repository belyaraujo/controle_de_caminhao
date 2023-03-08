<?php

namespace App\Exports;

use App\Models\Relatorio2;
use App\Models\Visitante;
use App\Http\Controllers\Relatorio2Controller;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;


class Relatorio2Export implements WithMapping, WithHeadings, Fromquery, WithCustomCsvSettings
{
    use Exportable;

    public function __construct(string $placa, string $datainicial, string $datafinal )
    {
        $this->placa = $placa;
        $this->datainicial = $datainicial;
        $this->datafinal = $datafinal;
    }

    public function query(){

        $solicitacao = Visitante::where('placa', $this->placa)
            ->wherebetween('created_at', [$this->datainicial . ' 00:00:00', $this->datafinal . ' 23:59:59']);

        $solicitacao = Visitante::where('placa', $this->placa)
            ->wherebetween('updated_at', [$this->datainicial . ' 00:00:00', $this->datafinal . ' 23:59:59']);

  return $solicitacao;

    }

    public function map($solicitacao): array
    {

        return [
            $solicitacao->placa,
            $solicitacao->created_at->format('d/m/Y - H:i'),
            $solicitacao->updated_at->format('d/m/Y - H:i'),
        ];


    }
    public function headings(): array
    {
        return [
            'Placa',
            'Entrada',
            'Saída'
        ];
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter'        => ',',
            'enclosure'        => '',
            'escape_character' => '\\',
            'contiguous'       => false,
            'use_bom'          => true,
            'input_encoding'   => 'UTF-8',
        ];
    }
}