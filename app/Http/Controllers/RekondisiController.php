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

    public function show()
    {
        $rekondisis = $this->rekondisiService->handleGetConditionRequestStock();

        return view("rekondisi.index", [
            'rekondisis' => $rekondisis,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->rekondisiService->handlePostStockNewCodition($request, $id);

        return back();
    }
}
