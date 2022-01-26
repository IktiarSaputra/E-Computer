<?php

namespace App\Exports;

use App\Models\Computer;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithMapping;

class ComputerExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Computer::with('location')->get();
    }

    public function map($computer) : array {
        return [
            $computer->id,
            $computer->no,
            $computer->location->name,
            $computer->procesor,
            $computer->memory,
            $computer->harddisk,
            $computer->vga,
            $computer->condition,
            $computer->network,
            $computer->monitor,
            $computer->mouse,
            $computer->keyboard,
            $computer->type,
            $computer->description,
            Carbon::parse($computer->created_at)->toFormattedDateString(),
            Carbon::parse($computer->updated_at)->toFormattedDateString()
        ] ;
 
 
    }

    public function headings(): array
    {
        return [
            'Id',
            'No',
            'Lokasi',
            'Procesor',
            'Memory',
            'HardDisk',
            'VGA',
            'Kondisi',
            'Network',
            'Monitor',
            'Mouse',
            'Keyboard',
            'Type',
            'Keterangan',
            'Created At',
            'Updated At'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1' => ['font' => ['bold' => true]],
            'B1' => ['font' => ['bold' => true]],
            'C1' => ['font' => ['bold' => true]],
            'D1' => ['font' => ['bold' => true]],
            'E1' => ['font' => ['bold' => true]],
            'F1' => ['font' => ['bold' => true]],
            'G1' => ['font' => ['bold' => true]],
            'H1' => ['font' => ['bold' => true]],
            'I1' => ['font' => ['bold' => true]],
            'J1' => ['font' => ['bold' => true]],
            'K1' => ['font' => ['bold' => true]],
            'L1' => ['font' => ['bold' => true]],
            'M1' => ['font' => ['bold' => true]],
            'N1' => ['font' => ['bold' => true]],
            'O1' => ['font' => ['bold' => true]],
            'P1' => ['font' => ['bold' => true]],
        ];
    }
}
