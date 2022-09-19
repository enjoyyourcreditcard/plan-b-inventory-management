<?php

namespace App\Http\Controllers;

use App\Models\WhApproval;
use App\Services\WhApprovalService;
use Illuminate\Http\Request;

class WarehouseApprovController extends Controller
{

    public function __construct(WhApprovalService $whapprovalService)
    {
        $this->whapprovalService = $whapprovalService;
    }

    public function index() {
        $whapproval = $this->whapprovalService->handleAllWhApproval();
        $whGroup = $this->whapprovalService->handleGroubWhApproval();
        return view('approval.warehouse_approval', [
            'whapproval' => $whapproval,
            'whGroup' => $whGroup,
            'groupedWarehouse' => $whapproval->groupBy('grf_code'),
        ]);
    }

    public function getAllWarehouseApproval()
    {
        return ResponseJSON($this->whapprovalService->handleAllWhApproval(), 200);
    }

    public function show($id) {
        $whapprov = $this->whapprovalService->handleShowWhApproval($id);
        return view('approval.check_whapproval', compact('whapprov'));
    }

    public function update(Request $request, $id){
        $whapprov = $this->warehouseService->handleUpdateWareHouse($request, $id);
        return view('approval.check_whapproval');
    }

    // public function update(Request $request) {
    //     $whapprov = $this->whapprovalService->handleUpdateWhApproval($request);
    //     return view('approval.check_whapproval', compact('whapprov'));
    // }

}
