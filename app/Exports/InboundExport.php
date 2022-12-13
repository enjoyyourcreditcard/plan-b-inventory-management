<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\WithEvents;
// use Maatwebsite\Excel\Events\AfterSheet;
use App\Models\Inbound;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class InboundExport implements WithHeadings,ShouldAutoSize
{
    use Exportable;
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'Part_id',
            'Orafin Code',
            'Serial Number(SN only)',
            'Quantity(non SN only)',
            'Stock Status',
            'Warehouse',
            'Brand',
        ];
    }

    
}
