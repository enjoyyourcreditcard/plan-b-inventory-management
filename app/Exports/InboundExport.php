<?php

namespace App\Exports;

use App\Models\Inbound;
// use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
// use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class InboundExport implements WithHeadings,ShouldAutoSize
{
    use Exportable;
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'part_id',
            'warehouse_id',
            'orafin_code',
            'sn_code',
            'condition',
            'expired_date',
            'stock_status',
            'status'
        ];
    }

    
}
