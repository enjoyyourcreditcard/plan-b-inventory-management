<?php

namespace App\Http\Controllers;

use App\Services\BrandService;
use App\Services\NotificationService;
use App\Services\PartService;
use App\Services\RequestFormService;
use App\Services\WareHouseService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(NotificationService $notificationService, RequestFormService $requestFormService, PartService $partService, BrandService $brandService, WareHouseService $warehouseService)
    {
        $this->notificationService = $notificationService; 
        $this->requestFormService = $requestFormService; 
        $this->partService = $partService; 
        $this->brandService = $brandService; 
        $this->warehouseService = $warehouseService; 
    }

    public function index()
    {
        //
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
        $requestForms = $this->requestFormService->handleShowRequestForm($code);
        $brands = $this->brandService->handleGetAllBrand();
        $parts = $this->partService->handleAllPart();
        $warehouses = $this->warehouseService->handleAllWareHouse();
        // return view('');

        return view('transaction.IC.detail_transaction', [
            'notifications' => $notifications,            
            'requestForms' => $requestForms,
            'parts' => $parts,
            'brands' => $brands,
            'warehouses' => $warehouses,
            'grf' => $grf
        ]);
        //
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
}
