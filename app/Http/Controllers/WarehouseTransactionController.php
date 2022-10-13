<?php

namespace App\Http\Controllers;

use App\Imports\WarehouseImport;
use App\Models\RequestStock;
use App\Models\WhApproval;
use App\Services\RequestStockService;
use App\Services\TransactionService;
use App\Services\WarehouseTransactionService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WarehouseTransactionController extends Controller
{

    public function __construct( RequestStockService $RequestStockService, WarehouseTransactionService $warehouseTransactionService,TransactionService $transactionService)
    {
        $this->warehouseTransactionService = $warehouseTransactionService;
        $this->transactionService = $transactionService;
        $this->RequestStockService = $RequestStockService;
    }

    public function index() {
        // *: Get data untuk warehouse approv
        $whapproval = $this->warehouseTransactionService->handleAllWhApproval();
        // *: Get data untuk warehouse return
        $whreturn = $this->warehouseTransactionService->handleAllWhReturn();
        return view('warehouse.home', [
            'whapproval' => $whapproval,
            'whreturn' => $whreturn
        ]);
    }

    public function getAllWarehouseApproval()
    {
        return ResponseJSON($this->warehouseTransactionService->handleAllWhApproval(), 200);
    }

    // *: Untuk show data approv
    public function show($id) {
        $whapprov = $this->warehouseTransactionService->handleShowWhApproval($id);
        $requestForm = $this->RequestStockService->handleRequestStockByRequestForms($whapprov->requestForms);
        // dd($whapprov);
        
        return view('warehouse.check_whapproval', compact('whapprov','requestForm'));
    }

    // *: Untuk show data return
    public function showReturn($id) {
        $whreturn = $this->warehouseTransactionService->handleShowWhReturn($id);
        $requestForm = $this->RequestStockService->handleRequestStockByRequestForms($whreturn->requestForms);
        // dd($requestForm);
        
        return view('warehouse.warehouse_return', compact('whreturn','requestForm'));
    }

    public function store(Request $request){
        $this->warehouseTransactionService->handleStoreWhApproval($request);
        return redirect()->back();
    }

    public function postApproveWH(Request $request)
    {
        $transactionService = $this->transactionService; 
        $this->warehouseTransactionService->handlePostApproveWH($request,$transactionService); 
        return redirect()->route('get.warehouse.home');
    }
    public function updateImport(Request $request){
        // ! ! //
        $excel = [];

        foreach (request()->file('file') as $key => $file) {
            $excel = Excel::toArray(new WarehouseImport, $file);
            
            foreach ($excel[0] as $row) {
                RequestStock::create([
                    'request_form_id' => $request->request_form_id,
                    'grf_id' => $request->grf_id,
                    'part_id' => $request->part_id,
                    'sn' => $row[0],
                    'sn_return' => null,
                    'remarks' => null,
                ]);
            }
            return redirect()->back();
        }
        // ! ! //
        

        // TODO: Validasi
        // if () {
        //     $this->validate($request, [
        //         'file' => 'required|mimes:csv,xls,xlsx,ods'
        //     ]);
        // }

        // TODO: Notif validasi
        // Session::flash('sukses','Data Siswa Berhasil Diimport!');
        }

}
