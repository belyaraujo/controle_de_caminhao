<?php

namespace App\Exports;

use App\Models\Placa;
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

    public function __construct(int $id_placa, string $datainicial, string $datafinal)
    {
        $this->id_placa = $id_placa;
        $this->datainicial = $datainicial;
        $this->datafinal = $datafinal;
    }

    public function query()
    {

          $cadastro = Cadastro::with('placas')->where('id_placa', $this->id_placa)
          ->whereBetween('created_at', [$this->datainicial . ' 00:00:00', $this->datafinal . ' 23:59:59']);

          $cadastro = Cadastro::with('placas')->where('id_placa', $this->id_placa)
          ->whereBetween('updated_at', [$this->datainicial . ' 00:00:00', $this->datafinal . ' 23:59:59']);

          return $cadastro;

    }

    public function map($cadastro): array
    {
        return [
            $cadastro->placas->placa, 
            $cadastro->created_at->format('d/m/Y - H:i'),
            $cadastro->updated_at->format('d/m/Y - H:i'),
        ];
    }


    public function headings(): array
    {
        return [
            'Placa',
            'Saída',
            'Entrada'
            
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