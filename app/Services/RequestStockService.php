<?php

namespace App\Services;

use App\Models\Rekondisi;
use Illuminate\Http\Request;
use App\Models\RequestForm as Requester;
use App\Models\RequestStock;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Route;

class RequestStockService
{

    public function __construct(Requester $requester, RequestStock $requestStock)
    {
        $this->requester = $requester;
        $this->requestStock = $requestStock;    
    }
    
    public function handleRequestStockByRequestForms($requestForms)
    {
        $requestStock = collect();
        if (Route::currentRouteName() == "warehouse.get.detail") {
            foreach ($requestForms as $item) {
               $requestStock->push(['id'=>$item->id,'name'=>$item->part->name,'part_id'=>$item->part->id, 'quantity'=>$item->quantity,'count' => $this->requestStock->where([['part_id', $item->part_id], ['grf_id', $item->grf_id], ['request_form_id', $item->id]])->count()]);
            }
        } else {
            foreach ($requestForms as $item) {
                $requestStock->push(['id'=>$item->id,'name'=>$item->part->name,'part_id'=>$item->part->id, 'quantity'=>$item->quantity,'count' => $this->requestStock->where([['part_id', $item->part_id], ['grf_id', $item->grf_id], ['request_form_id', $item->id], ['sn_return', '!=', null]])->count()]);
             }
        }

        return $requestStock;

    }

}