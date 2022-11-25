<?php

namespace App\Http\Controllers;

use App\Models\Grf;
use App\Models\RequestForm;
use App\Services\BrandService;
use App\Services\NotificationService;
use App\Services\PartService;
use App\Services\RequestFormService;
use App\Services\TransactionService;
use App\Services\WarehouseService;
// use Barryvdh\DomPDF\Facade\Pdf;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(TransactionService $transactionService, NotificationService $notificationService, RequestFormService $requestFormService, PartService $partService, BrandService $brandService, WarehouseService $WarehouseService)
    {
        $this->notificationService = $notificationService;
        $this->transactionService = $transactionService;
        $this->requestFormService = $requestFormService;
        $this->partService = $partService;
        $this->brandService = $brandService;
        $this->WarehouseService = $WarehouseService;
    }

    public function index()
    {
        $requestForms = $this->requestFormService->handleAllRequestFormInbound();
        // dd($requestForms);
        // return view("transaction.transaction", [
        //     'requestForms' => $requestForms
        // ]);
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


        // $notifications =  $this->notificationService->handleAllNotification();
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
        $warehouses = $this->WarehouseService->handleAllWareHouse();

        return view('transaction.IC.detail-transaction', [
            // 'notifications' => $notifications,
            'requestForms' => $requestForms,
            'stock' => $stock,
            'parts' => $parts,
            'parts_segment' => $parts_segment,
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
        //     return redirect()->route('view.IC.transaction');
        // return $request->part[0];
    }

    public function postApproveSJ(Request $request)
    {
        $this->transactionService->handlePostApproveSJ($request);
        return redirect()->route('view.IC.transaction');
    }


    public function postRejectIC(Request $req)
    {

        // dd($req->id);
        try {
            $this->transactionService->handlePostRejectIC($req->id);
            return Redirect::back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
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

    public function getAllBrandListByGRF($code)
    {
        $requestForms = $this->requestFormService->handleShowRequestForm($code)->unique('segment_id');
        // dd($requestForms);
        $brand = collect();
        foreach ($requestForms as $item) {
            $brand = $brand->merge($this->brandService->handleBrandBySegment($item->segment_id));
        };
        return ResponseJSON($brand);
    }





    public function getAllSegmentByGRF($code)
    {
        $requestForms = $this->requestFormService->handleShowRequestForm($code);
        foreach ($requestForms as $key => $item) {
            $requestForms[$key]->brand = $this->brandService->handleBrandBySegment($item->segment_id);
        };


        return ResponseJSON($requestForms);
    }

    public function ViewSuratJalanPDF($grf_id)
    {

        $grf = Grf::find($grf_id);
        $request_form = RequestForm::where("grf_id", $grf_id)->get();

        $pdf = PDF::loadView('generate.suratjalan', ['grf' => $grf, 'request_form' => $request_form]);
        return $pdf->stream('laporan-pdf.pdf');
    }


    public function ViewGRFPDF($grf_id)
    {

        $grf = Grf::find($grf_id);
        $request_form = RequestForm::where("grf_id", $grf_id)->get();

        $pdf = PDF::loadView('generate.grf', ['grf' => $grf, 'request_form' => $request_form]);
        return $pdf->stream('laporan-pdf.pdf');
    }


    public function getAllGRFOutbound()
    {

        try {
            $requestForms = $this->requestFormService->handleAllRequestFormInbound();
            return  ResponseJSON($requestForms);
        } catch (\Exception $e) {
            return  ResponseJSON($e->getMessage(), 500);
        }

        # code...
    }
    public function viewOutbound()
    {
        return view('transaction.IC.outbound');
    }

    /*
    *--------------------------------------------------------------------------
    * Home IC return stock
    *--------------------------------------------------------------------------
    */
    public function returnStockIndex(){
        try {
            return view('transaction.IC.return-stock');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *--------------------------------------------------------------------------
    * Home IC return stock
    *--------------------------------------------------------------------------
    */
    public function returnStockStore($id){
        try {
            $this->transactionService->handleStoreReturnStockGrf($id);
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *--------------------------------------------------------------------------
    * API home IC return stock
    *--------------------------------------------------------------------------
    */
    public function getAllGRFReturnStock(){
        return ResponseJSON($this->transactionService->handleGetReturnStockGrf(), 200);
    }
}
