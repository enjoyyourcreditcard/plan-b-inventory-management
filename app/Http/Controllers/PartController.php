<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Services\PartService;
use App\Services\BrandService;
use App\Services\StockService;
use App\Services\CategoryService;
use App\Services\AttachmentService;
use App\Services\HistoryPriceService;
use App\Services\NotificationService;
use App\Services\WareHouseService;
use Illuminate\Support\Facades\Auth;

class PartController extends Controller
{

    public function __construct(stockService $stockService, HistoryPriceService $historypriceService, AttachmentService $attachmentService, PartService $partService, CategoryService $categoryService, BrandService $brandService, NotificationService $notificationService, WareHouseService $warehouseService)
    {
        $this->historypriceService = $historypriceService;
        $this->attachmentService = $attachmentService;
        $this->partService = $partService;
        $this->categoryService = $categoryService;
        $this->brandService = $brandService;
        $this->warehouseService = $warehouseService;
        $this->stockService = $stockService;
        $this->notificationService = $notificationService;
    }

    /* 
    *|--------------------------------------------------------------------------
    *| View Part
    *|--------------------------------------------------------------------------
    */
    public function index()
    {
        $categories =  $this->categoryService->handleGetAllCategory();
        $brands = $this->brandService->handleAllBrand();
        // $brandString = $this->brandService->handleGetAllBrandGroupByCategory();
        $part = $this->partService->handleAllPart();
        $notifications =  $this->notificationService->handleAllNotification();
        return view('part.part', [
            'notifications' => $notifications,
            'categories' => $categories,
            'brands' => $brands,
            'part' => $part,
            // 'brandString'=>$brandString
        ]);
    }

    /* 
    *|--------------------------------------------------------------------------
    *| Ajax Part for Select2 in part view 
    *|--------------------------------------------------------------------------
    */
    public function ajaxIndex()
    {
        $brandString = $this->brandService->handleGetAllBrandGroupByCategory();
        $categories =  $this->categoryService->handleGetAllCategory();
        return response()->json([
            'categories' => $categories,
            'brandString' => $brandString
        ]); //? pake helper ResponseJSON
    }

    /* 
    *|--------------------------------------------------------------------------
    *| Store Part 
    *|--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $this->partService->handleStorePart($request);
        return redirect()->back();
    }

    /* 
    *|--------------------------------------------------------------------------
    *| View Detail Part 
    *|--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $history_prices = $this->historypriceService->handleGetHistoryPriceByPartId($id);
        $attachment = $this->attachmentService->handleAllAttachment($id);
        $part = $this->partService->handleShowPart($id);
        $stocks = $this->stockService->handleGetStockByPartId($id);
        $warehouse = $this->warehouseService->handleAllWareHouse();
        $categories = $this->categoryService->handleGetAllCategory();
        $brands = $this->brandService->handleGetAllBrand();
        $is_sn = $part->sn_status == "sn";
        $uoms = $this->partService->handleShowUomGroupByCategory($id);
        $brand = $this->partService->handleShowBrandGroupByCategory($id); //todo nama variabel diganti jadi $brandByCategory
        $notifications =  $this->notificationService->handleAllNotification();

        return view('part.detail', [
            'notifications' => $notifications,
            'historyprices' => $history_prices,
            'attachment' => $attachment,
            'part' => $part,
            'stocks' => $stocks,
            'warehouse' => $warehouse,
            'part_id' => $id,
            'categories' => $categories,
            'brands' => $brands,
            'uoms' => $uoms,
            'is_sn' => $is_sn,
            'brand' => $brand
        ]);
    }

    /* 
    *|--------------------------------------------------------------------------
    *| Update Part 
    *|--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $this->partService->handleUpdatePart($request, $id);
        return redirect()->back();
    }

    /* 
    *|--------------------------------------------------------------------------
    *| Change Status Part  
    *|--------------------------------------------------------------------------
    */
    public function deactive($id)
    {
        $this->partService->handleDeactivePart($id);
        return redirect()->back();
    }

    /* 
    *|--------------------------------------------------------------------------
    *| Api Get All Part  
    *|--------------------------------------------------------------------------
    */
    public function getAllPart(Request $req)
    {
        return ResponseJSON($this->partService->handleAllPartApi($req), 200);
    }

    /* 
    *|--------------------------------------------------------------------------
    *| Api Get All Deactive Part  
    *|--------------------------------------------------------------------------
    */
    public function getDeactivePart($id)
    {
        return ResponseJSON($this->partService->handleDeactivePart($id), 200);
    }
};
