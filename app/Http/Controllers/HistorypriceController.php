<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historyprice;
use App\Services\HistorypriceService;
use Illuminate\Support\Facades\Validator;

class HistorypriceController extends Controller
{
    public function __construct(HistorypriceService $hpService)
    {
        $this->hpService = $hpService;
    }
    
    public function index()
    {
        // return ResponseJSON($this->hpService->handleIndex(), 200);
        return $this->hpService->handleIndex();
    }

    public function store(Request $request)
    {
        return $this->hpService->handleStore($request);
    }
}
