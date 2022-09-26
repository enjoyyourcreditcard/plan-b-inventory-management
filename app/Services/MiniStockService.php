<?php

namespace App\Services;

use App\Models\Grf;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MiniStockService
{
    public function __construct(Stock $stock, Grf $grf)
    {
        $this->stock = $stock;
        $this->grf = $grf;
    }

    public function handleGetAllMiniStock()
    {
        dd($this->grf->where('user_id', Auth::user()->id)->get());
    }
}
