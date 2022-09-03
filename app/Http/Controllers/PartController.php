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

class PartController extends Controller
{

    public function __construct(HistoryPriceService $historypriceService, AttachmentService $attachmentService, PartService $partService, CategoryService $categoryService, BrandService $brandService, StockService $stockService)
    {
        $this->historypriceService = $historypriceService;
        $this->attachmentService = $attachmentService;
        $this->partService = $partService;
        $this->categoryService = $categoryService;
        $this->brandService = $brandService;
        $this->stockService = $stockService;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =  $this->categoryService->handleGetAllCategory();
        $brands = $this->brandService->handleAllBrand();
        $brandString = $this->brandService->handleGetAllBrandGroupByCategory();
        $part = $this->partService->handleAllPart();
        return view('part.part', [
            'categories' => $categories,
            'brands'=>$brands,
            'part' =>$part,
            'brandString'=>$brandString
            
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
        $this->partService->handleStorePart($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd("asadsa");
        $history_prices = $this->historypriceService->handleGetHistoryPriceByPartId($id);
        $attachment = $this->attachmentService->handleAllAttachment($id);
        $part = $this->partService->handleShowPart($id);
        $stocks = $this->stockService->handleGetStockByPartId($id);
        $categories = $this->categoryService->handleGetAllCategory();
        $brands = $this->brandService->handleGetAllBrand();
        $is_sn = $part->sn_status == "sn";
        $uoms = $this->partService->handleShowUomGroupByCategory($id);
        $brand = $this->partService->handleShowBrandGroupByCategory($id);
        return view('part.detail', [
            'historyprices' => $history_prices,
            'attachment' => $attachment,
            'part' => $part,
            'stocks' => $stocks,
            'part_id' => $id,
            'categories' => $categories,
            'brands' => $brands,
            'uoms' => $uoms,
            'is_sn' => $is_sn,
            'brand' => $brand
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
        $this->partService->handleUpdatePart($request, $id);
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactive($id)
    {
        $this->partService->handleDeactivePart($id);
        return redirect()->back();
    }

    public function getAllPart()
    {
        return ResponseJSON($this->partService->handleAllPartApi(), 200);
    }
    public function getDeactivePart($id)
    {
        return ResponseJSON($this->partService->handleDeactivePart($id), 200);
    }
};

// =======
// use Illuminate\Http\Request;
// use App\Models\Part;
// use App\Services\PartService;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\File;

// class PartController extends Controller
// {
//     public function __construct(PartService $partService)
//     {
//     }


    

//     public function show($id)
//     {
//         return $this->partService->handleShowPart($id);
//     }



//     public function update(Request $request, $id)
//     {
//         $this->partService->handleUpdatePart($request, $id);

//         return redirect('/detail/part/'.$id);
//     }

//     public function getDeactivePart($id)
//     {
//         return ResponseJSON($this->partService->handleDeactivePart($id), 200);
// >>>>>>> origin/category
//     }
