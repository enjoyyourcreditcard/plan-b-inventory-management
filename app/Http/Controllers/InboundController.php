<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PartService;
use App\Exports\InboundExport;
use App\Imports\InboundImport;
use App\Services\InboundService;
use App\Services\WarehouseService;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\NotificationService;

class InboundController extends Controller
{
    public function __construct(InboundService $inboundService, PartService $partService, NotificationService $notificationService, WarehouseService $warehouseService)
    {
        $this->inboundService = $inboundService;
        $this->partService = $partService;
        $this->notificationService = $notificationService;
        $this->warehouseService = $warehouseService;
    }

    public function index()
    {
        $inbound =  $this->inboundService->handleAllInbound();
        $parts = $this->partService->handleAllPart();
        $notifications =  $this->notificationService->handleAllNotification();
        $warehouse = $this->warehouseService->handleAllWareHouse();
        return view('stock.inbound', [
            'inbound' => $inbound,
            'parts' => $parts,
            'notifications' => $notifications,
            'warehouse' => $warehouse,
        ]);
    }

    public function store(Request $request){
        $this->inboundService->handleStoreInbound($request);
        return redirect()-> back();
    }

    public function update(Request $request){
        $this->inboundService->handleUpdateInbound($request);
        
        return redirect()->back();
    }

    public function delete($id){
        $this->inboundService->handleDeleteInbound($id);
        return redirect()->back();

    }

    function allup(Request $request)
    {
        $this->inboundService->handleAllUpInbound($request);
        $this->inboundService->handleAllDeleteInbound($request);
        return redirect()->back();
    }

    function up($id)
    {
        $this->inboundService->handleUpInbound($id);
        $this->inboundService->handleDeleteInbound($id);
        return redirect()->back();
    }
    
    // export excel

    public function export()
	{
		return (new InboundExport)->download('inboundPO.xlsx');

	}

    public function import(Request $request) 
	{
        // dd($request);
		// $this->validate($request, [
		// 	'file' => 'required|mimes:csv,xls,xlsx'
		// ]);

        Excel::import(new InboundImport, $request->file('excel')->store('temp'));
		// Excel::import(new InboundImport, $file);

        // Excel::import(new InboundImport, $request->file);
 
		return redirect()->back();
	}

    // api

    public function getAllInbound(Request $request)
    {
        return ResponseJSON($this->inboundService->handleAllInboundApi($request), 200);
    }

    public function postStoreInbound(Request $request)
    {
        return ResponseJSON($this->inboundService->handleStoreInboundApi($request), 200);
    }

    public function putUpdateInbound(Request $request, $id)
    {
        return ResponseJSON($this->inboundService->handleUpdateInboundApi($request, $id), 200);
    }

    public function getDeleteInbound($id)
    {
        return ResponseJSON($this->inboundService->handleDeleteInboundApi($id), 200);
    }
}
