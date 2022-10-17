<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Services\PartService;
use App\Services\BrandService;
use App\Services\StockService;
use App\Services\SegmentService;
use App\Services\CategoryService;
use App\Services\WarehouseService;
use App\Services\AttachmentService;
use Illuminate\Support\Facades\Auth;
use App\Services\HistorypriceService;
use App\Services\NotificationService;

class PartController extends Controller
{

    public function __construct(stockService $stockService, HistorypriceService $HistorypriceService, AttachmentService $attachmentService, PartService $partService, CategoryService $categoryService, BrandService $brandService, NotificationService $notificationService, WarehouseService $WarehouseService, SegmentService $segmentService)
    {
        $this->HistorypriceService = $HistorypriceService;
        $this->attachmentService = $attachmentService;
        $this->partService = $partService;
        $this->categoryService = $categoryService;
        $this->brandService = $brandService;
        $this->WarehouseService = $WarehouseService;
        $this->stockService = $stockService;
        $this->notificationService = $notificationService;
        $this->segmentService = $segmentService;
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
        $segments = $this->segmentService->handleAllSegment();
        $part = $this->partService->handleAllPart();
        $notifications =  $this->notificationService->handleAllNotification();
        return view('master.part', [
            'notifications' => $notifications,
            'categories' => $categories,
            'brands' => $brands,
            'part' => $part,
            'segments' => $segments,
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
        $segments = $this->segmentService->handleAllSegment();
        return response()->json([
            'segments' => $segments,
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
        $history_prices = $this->HistorypriceService->handleGetHistorypriceByPartId($id);
        $attachment = $this->attachmentService->handleAllAttachment($id);
        $part = $this->partService->handleShowPart($id);
        $stocks = $this->stockService->handleGetStockByPartId($id);
        $warehouse = $this->WarehouseService->handleAllWareHouse();
        $categories = $this->categoryService->handleGetAllCategory();
        $brands = $this->brandService->handleGetAllBrand();
        $is_sn = $part->sn_status == "sn";
        $uoms = $this->partService->handleShowUomGroupByCategory($id);
        $brandByCategory = $this->partService->handleShowBrandGroupByCategory($id); //todo nama variabel diganti jadi $brandByCategory
        $notifications =  $this->notificationService->handleAllNotification();

        return view('part.detail', [
            'notifications' => $notifications,
            'Historyprices' => $history_prices,
            'attachment' => $attachment,
            'part' => $part,
            'stocks' => $stocks,
            'warehouse' => $warehouse,
            'part_id' => $id,
            'categories' => $categories,
            'brands' => $brands,
            'uoms' => $uoms,
            'is_sn' => $is_sn,
            'brand' => $brandByCategory
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
    *| Api Get All Part  
    *|--------------------------------------------------------------------------
    */
    public function getAllPartBySegment($id)
    {
        return ResponseJSON($this->partService->handleGetAllPartsBySegment($id), 200);
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
