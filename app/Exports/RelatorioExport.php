<?php

namespace App\Exports;

use App\Models\Cadastro;
use App\Models\Relatorio;
use App\Http\Controllers\RelatorioController;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class RelatorioExport implements WithMapping, WithHeadings, Fromquery, WithCustomCsvSettings
{
    use Exportable;


    public function __construct(string $id_placa, string $datainicial, string $datafinal)
    {
        $this->id_placa = $id_placa;
        $this->datainicial = $datainicial;
        $this->datafinal = $datafinal;
    }

    public function query()
    {

        $solic = Cadastro::with('placas')->where('id_placa', $this->id_placa)
            ->whereBetween('created_at', [$this->datainicial . ' 00:00:00', $this->datafinal . ' 23:59:59']);

        return $solic;
        //print_r($solic);
    }


    public function map($solic): array
    {
        return [
            $solic->placas->placa,
            $solic->created_at->format('d/m/Y'),
            $solic->where('id_placa', $this->id_placa)
                ->whereBetween('created_at', [$this->datainicial . ' 00:00:00', $this->datafinal . ' 23:59:59']),
        ];
    }

    public function headings(): array
    {
        return [
            'Placa',
            'Data',
            
        ];
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter'        => ',',
            'enclosure'        => null,
            'escape_character' => '\\',
            'contiguous'       => false,
            'use_bom'          => true,
            'input_encoding'   => 'UTF-8',
        ];
    }
}