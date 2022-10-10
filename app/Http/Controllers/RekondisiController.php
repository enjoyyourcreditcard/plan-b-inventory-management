<?php

namespace App\Http\Controllers;

use App\Services\RekondisiService;
use Illuminate\Http\Request;

class RekondisiController extends Controller
{
    public function __construct(RekondisiService $rekondisiService)
    {
        $this->rekondisiService = $rekondisiService;
    }

    public function index()
    {
        $rekondisis = $this->rekondisiService->handleGetConditionStock();

        dd($rekondisis);
        return view("rekondisi.rekondisi", [
            'rekondisis' => $rekondisis,
        ]);
    }
}
