<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\RequestForm as Requester;
use App\Models\RequestStock;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

class RequestStockService
{

    public function __construct(Requester $requester, RequestStock $requestStock)
    {
        $this->requester = $requester;
        $this->requestStock = $requestStock;
    
    }
    
    public function handleRequestStockByRequestForms($requestForms)
    {
        // dd("asdasd");

        $requestStock = collect();
        // partid
        foreach ($requestForms as $item) {
        $requestStock->push(['id'=>$item->id,'name'=>$item->part->name,'part_id'=>$item->part->id, 'quantity'=>$item->quantity,'count' => $this->requestStock->where('part_id', $item->part_id)->count()]);
        }

        return $requestStock;

    }

}