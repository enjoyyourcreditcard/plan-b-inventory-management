<?php

use App\Models\User;
use App\Models\Warehouse;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SegmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MiniStockController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserTransactionController;
use App\Http\Controllers\HistoryPriceController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseTransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->to("/home");

});

Route::get('/suratjalan/{grf}', [TransactionController::class, 'ViewSuratJalanPDF'])->name('view.surat.jalan');


// suratjalan/1



// Route::get('/transaction', function () {
// });

// Route::get('/rekondisi', function () {
//     return view("rekondisi.rekondisi");
// });


// Route::get('/transaction', [::class, 'index']);



// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/me', function (Request $request) {
//         return Auth::user()->tokens;
//     });
// });


// Route::get('/part', function () {
//     return view('part.part');
// })->middleware(["auth:sanctum", 'ability:check-status']);   




/* 
*|--------------------------------------------------------------------------
*|  Part Routes 
*|--------------------------------------------------------------------------
*/
Route::resource('/part' , PartController::class)->middleware("auth");

Route::get('/ajax/part' , [PartController::class, 'ajaxIndex'])->middleware("auth");
Route::post('/historyprice', [App\Http\Controllers\HistoryPriceController::class, 'store'])->name('post.store.historyprice')->middleware("auth");
Route::post('/brand', [BrandController::class, 'store'])->name('post.store.brand')->middleware("auth");
Route::get('/stock', [StockController::class, 'index'])->middleware("auth");
Route::post('/stock', [StockController::class, 'store'])->name('post.store.stock')->middleware("auth");
Route::put('/stock/{id}', [StockController::class, 'put'])->name('put.update.stock')->middleware("auth");
Route::delete('/stock/{id}', [StockController::class, 'destroy'])->name('delete.destroy.stock')->middleware("auth");

Route::post('/brand/update', [CategoryController::class, 'update'])->name('post.update.brand')->middleware("auth");
Route::get('/part/deactive/{id}', [PartController::class, 'deactive'])->name('post.deactive.part')->middleware("auth");


Route::post('/attachment', [AttachmentController::class, 'store'])->name('post.store.attachment')->middleware("auth");
Route::post('/category', [CategoryController::class, 'store'])->name('post.store.category')->middleware("auth");
Route::get('/category/{id}', [CategoryController::class, 'show'])->middleware("auth");
Route::post('/category/update', [CategoryController::class, 'update'])->name('post.update.category')->middleware("auth");


Route::resource('/segment', SegmentController::class)->middleWare('auth');


Route::get('/notification/delete/{id}', [NotificationController::class, 'destroy'])->name('post.delete.notif')->middleware("auth");
Route::get('/notification', [NotificationController::class, 'index'])->name('get.index.notif')->middleware("auth");





Route::get('/detail/grf/{code}', [TransactionController::class, 'show'])->middleware("auth")->name('get.detail.grf');
Route::get('/transaction', [TransactionController::class, 'index'])->middleware("auth")->name("view.IC.transaction");

// Route::post('/category', [CategoryController::class, 'store'])->name('post.store.category');
// Route::resource('/brand', BrandController::class);
// Route::post('/brand/deactive/{id}', [BrandController::class, 'postDeactive']);



/*
*|--------------------------------------------------------------------------
*| Build Routes
*|--------------------------------------------------------------------------
*/

Route::get('/build', [BuildController::class, 'index']);
Route::post('/build', [BuildController::class, 'store']);
Route::put('/build/{id}', [BuildController::class, 'update']);
Route::delete('/build/{id}', [BuildController::class, 'delete']);





/*
*--------------------------------------------------------------------------
* Stock Routes
*--------------------------------------------------------------------------
*/
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');





/*
*--------------------------------------------------------------------------
* Transactions
*--------------------------------------------------------------------------
*/



/*
*--------------------------------------------------------------------------
* Auth Warehouse Home
*--------------------------------------------------------------------------
*/
Route::get('/warehouse', [WarehouseTransactionController::class, 'index'])->name('get.warehouse.home');
Route::get('/warehouse/action/grf/{id}', [WarehouseTransactionController::class, 'show'])->name("get.warehouse.show.action.grf");
Route::post('/warehouse-import', [WarehouseTransactionController::class, 'updateImport'])->name('importexcel');
Route::get('/warehouse-transfer', [WarehouseTransactionController::class, 'indexTransfer'])->middleware('auth')->name('get.warehouse.transfer');
Route::post('/warehouse-transfer', [WarehouseTransactionController::class, 'storeGrfTransfer'])->middleware('auth')->name('post.warehouse.transfer');
Route::get('/warehouse-transfer/{code}', [WarehouseTransactionController::class, 'createTransfer'])->middleware('auth')->name('get.warehouse.create');
Route::post('/warehouse-transfer/{code}', [WarehouseTransactionController::class, 'storeTransfer'])->middleware('auth')->name('post.warehouse.create');
Route::put('/warehouse-transfer', [WarehouseTransactionController::class, 'updateTransfer'])->middleware('auth')->name('put.warehouse.create');
Route::delete('/warehouse-transfer/{code}', [WarehouseTransactionController::class, 'deleteTransfer'])->middleware('auth')->name('delete.warehouse.create');

Route::post('/warehouse-transfer/pieces/{code}', [WarehouseTransactionController::class, 'storePiecesTransfer'])->middleware('auth')->name('post.warehouse.transfer.pieces');
Route::post('/warehouse-transfer/bulk/{code}', [WarehouseTransactionController::class, 'storeBulkTransfer'])->middleware('auth')->name('post.warehouse.transfer.bulk');


/*
*--------------------------------------------------------------------------
* Auth User Home
*--------------------------------------------------------------------------
*/
Route::get('/request-form', [UserTransactionController::class, 'index'])->middleware('auth')->name('get.requester.home');
Route::get('/request-form/{grf_code}', [UserTransactionController::class, 'create'])->middleware('auth');
Route::post('/request-form', [UserTransactionController::class, 'storeGrf'])->middleware('auth');
Route::post('/request-form/{id}', [UserTransactionController::class, 'store'])->middleware('auth');
Route::put('/request-form/{id}', [UserTransactionController::class, 'update'])->middleware('auth');
Route::get('/delete/request-form/{code}', [UserTransactionController::class, 'destroy'])->middleware('auth');





/*
*--------------------------------------------------------------------------
* Approval Routes
*--------------------------------------------------------------------------
*/
Route::post('/transaction/approve/WH', [WarehouseTransactionController::class, 'postApproveWH'])->middleware("auth")->name("post.approve.WH");
Route::post('/transaction/approve/IC', [TransactionController::class, 'postApproveIC'])->middleware("auth")->name("post.approve.IC");
Route::post('/transaction/approve/SJ', [TransactionController::class, 'postApproveSJ'])->middleware("auth")->name("post.approve.SJ");
Route::get('/transaction/approve/pickup/{id}', [UserTransactionController::class, 'getApprovePickup'])->middleware("auth")->name("post.approve.pickup");





/*
*--------------------------------------------------------------------------
* Master 
*--------------------------------------------------------------------------
*/
Route::get('/master/user', [UserController::class, 'index'])->middleware("auth");
Route::post('/master/user/deactive', [UserController::class, 'postDeactive'])->middleware("auth")->name("post.deactive.user");



// Route::resource('/warehouse' , WarehouseController::class)->middleware("auth");
/*
*--------------------------------------------------------------------------
* MINI STOCK 
*--------------------------------------------------------------------------
*/
Route::get('/mini-stock', [MiniStockController::class, 'index'])->middleware("auth")->name("get.mini.stock");




Route::post('/warehouse-approv', [WarehouseTransactionController::class, 'store'])->name('inputsatuan');
/*
*--------------------------------------------------------------------------
* Return Stock
*--------------------------------------------------------------------------
*/
Route::get('/return/{code}', [UserTransactionController::class, 'showReturnStock'])->middleware("auth")->name("get.show.return.stock");
// Route::put('/return/{code}', [UserTransactionController::class, 'updateReturnStock'])->middleware("auth")->name("put.show.return.stock");
Route::get('/ajax/return/{code}', [UserTransactionController::class, 'ajaxReturnStock'])->middleware("auth");
Route::post('/return/{id}', [UserTransactionController::class, 'updateReturnStock'])->middleware("auth")->name("put.show.return.stock");
