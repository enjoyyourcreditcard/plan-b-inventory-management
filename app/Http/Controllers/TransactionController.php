<?php

namespace App\Http\Controllers;

use App\Services\BrandService;
use App\Services\NotificationService;
use App\Services\PartService;
use App\Services\RequestFormService;
use App\Services\TransactionService;
use App\Services\WareHouseService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(TransactionService $transactionService, NotificationService $notificationService, RequestFormService $requestFormService, PartService $partService, BrandService $brandService, WareHouseService $warehouseService)
    {
        $this->notificationService = $notificationService;
        $this->transactionService = $transactionService;
        $this->requestFormService = $requestFormService;
        $this->partService = $partService;
        $this->brandService = $brandService;
        $this->warehouseService = $warehouseService;
    }

    public function index()
    {
        $requestForms = $this->requestFormService->handleAllRequestFormInbound();
        return view("transaction.transaction", [
            'requestForms' => $requestForms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {


        $notifications =  $this->notificationService->handleAllNotification();
        $grf = $this->requestFormService->handleGetCurrentGrf($code);
        $requestForms = $this->requestFormService->handleShowRequestForm($code)->unique('segment_id');
        $stock = collect();
        $parts_segment = collect();

        foreach ($requestForms as $item) {
            $part = $this->partService->handleGetAllPartsBySegment($item->segment_id);
            $stock = $stock->merge($part);

            $parts_segment->push($part);
        };
        // dd($parts_segment);
        
        $brands = $this->brandService->handleGetAllBrand();
        $parts = $this->partService->handleAllPart();
        $warehouses = $this->warehouseService->handleAllWareHouse();

        return view('transaction.IC.detail_transaction', [
            'notifications' => $notifications,
            'requestForms' => $requestForms,
            'stock'=>$stock,
            'parts' => $parts,
            'parts_segment'=>$parts_segment,
            'brands' => $brands,
            'warehouses' => $warehouses,
            'grf' => $grf
        ]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function postApproveIC(Request $request)
    {
    $this->transactionService->handlePostApproveIC($request);
        return redirect()->route('view.IC.transaction');
    }

    public function postApproveSJ(Request $request)
    {
    $this->transactionService->handlePostApproveSJ($request);
        return redirect()->route('view.IC.transaction');
    }

    public function getAllStockListByGRF($code)
    {
        $requestForms = $this->requestFormService->handleShowRequestForm($code)->unique('segment_id');
        $stock = collect();
        foreach ($requestForms as $item) {
            $stock = $stock->merge($this->partService->handleGetAllPartsBySegment($item->segment_id));
        };
        return ResponseJSON($stock);
    }

    public function getAllSegmentByGRF($code)
    {
        $requestForms = $this->requestFormService->handleShowRequestForm($code);
        return ResponseJSON($requestForms);
    }

}
