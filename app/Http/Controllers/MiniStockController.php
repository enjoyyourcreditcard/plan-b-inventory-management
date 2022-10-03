<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MiniStockService;
use App\Services\TransactionService;

class MiniStockController extends Controller
{
    public function __construct (MiniStockService $miniStockService, TransactionService $transactionService)
    {
        $this->miniStockService = $miniStockService;
        $this->transactionService = $transactionService;
    }

    /*
    |--------------------------------------------------------------------------
    | Index Menampilkan Halaman Ministock
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $stocks = $this->miniStockService->handleMiniStockByUser();
        $timers = $this->transactionService->handleTimer();
        // dd($timers);

        return view('transaction.miniStock.miniStock', [
            'stocks' => $stocks,
            'timers' => $timers
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Api Mengambil MiniStock
    |--------------------------------------------------------------------------
    */
    public function getAllMiniStock()
    {
        // Return JSON
        return ResponseJSON($this->miniStockService->handleMiniStockByUser(), 200);
    }
}
