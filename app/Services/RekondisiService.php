<?php

namespace App\Services;

use App\Models\Part;
use App\Models\Stock;
use App\Models\Rekondisi;
use App\Models\Warehouse;

use App\Models\RequestStock;
use Illuminate\Http\Request;

class RekondisiService
{

    public function __construct(Part $part, RequestStock $requestStock, Rekondisi $rekondisi)
    {
        $this->rekondisi = $rekondisi;
    }

    public function handleGetConditionStock()
    {
        $rekondisis = $this->rekondisi->with('requestStock')->where('condition' == 'good new')->orWhere('condition' == 'replace');
        return($rekondisis);
    }
}
