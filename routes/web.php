<?php
// Models
use App\Models\User;
use App\Models\Warehouse;

// Facades
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

// Controllers
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HistoryPriceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MiniStockController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\RekondisiController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SegmentController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserTransactionController;
use App\Http\Controllers\WarehouseTransactionController;
use App\Http\Controllers\WarehouseReturnController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;

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

// Jangan di rubah
Route::post('/api/login', [AuthController::class, 'login']);

Route::get('/', function () {
    return view('layout.app');
});


Route::get('/welcome', function () {
    return view('welcome');
});
Auth::routes();


Route::get('/', function () {
    return redirect()->to("/home");
});

Route::get('/suratjalan/{grf}', [TransactionController::class, 'ViewSuratJalanPDF'])->name('view.surat.jalan');

Route::get('/home', [HomeController::class, 'index'])->name('home');



// Route::get('/transaction', function () {
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
*|  Master Routes 
*|--------------------------------------------------------------------------
*/


// * Part 
Route::group(['prefix' => 'part', 'as' => 'part.', 'middleware' => ['auth','InventoryControl']], function () {
    Route::get('/', [PartController::class, 'index'])->name("view.home");
    Route::get('/{id}', [PartController::class, 'show'])->name("get.detail");
    Route::get('/ajax', [PartController::class, 'ajaxIndex'])->name("get.ajax");
    Route::post('/deactive', [PartController::class, 'deactive'])->name('post.deactive');
    Route::post('/', [PartController::class, 'store'])->name("store");
    Route::get('/tampilan/{id}',[PartController::class, 'tampilan'])->name("tampilan");
    Route::put('/{id}', [PartController::class, 'update'])->name("put.part");
});

// part.post.deactive
// * User 
Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth','InventoryControl']], function () {
    Route::get('/', [UserController::class, 'index'])->name("get.view");
    Route::post('/', [UserController::class, 'store'])->name("store");
    Route::put('/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/status', [UserController::class, 'postStatus'])->name('post.status');
    // Route::get('/{id}', [PartController::class, 'show'])->name("get.detail");
    // Route::get('/ajax', [PartController::class, 'ajaxIndex'])->name("get.ajax");
});

Route::get('/master/user', [UserController::class, 'index'])->middleware("auth");
// Route::post('/master/user/deactive', [UserController::class, 'postDeactive'])->middleware("auth")->name("post.deactive.user");

// * Brand 
Route::group(['prefix' => 'brand', 'as' => 'brand.', 'middleware' => ['auth','InventoryControl']], function () {
    Route::get('/', [BrandController::class, 'index'])->name('get.view')->middleware("auth");
    Route::post('/', [BrandController::class, 'store'])->name('post');
    Route::post('/update', [CategoryController::class, 'update'])->name('post.update');
});



Route::post('/historyprice', [HistorypriceController::class, 'store'])->name('post.store.historyprice')->middleware("auth");
Route::post('/brand', [BrandController::class, 'store'])->name('post.store.brand')->middleware("auth");
Route::post('/attachment', [AttachmentController::class, 'store'])->name('post.store.attachment')->middleware("auth");

//* Category 
Route::group(['prefix' => 'category', 'as' => 'category.', 'middleware' => ['auth']], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('get.view');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('get.detail');
    Route::post('/', [CategoryController::class, 'store'])->name('post');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('post.update');
});


// * Segment 
Route::group(['prefix' => 'segment', 'as' => 'segment.', 'middleware' => ['auth']], function () {
    Route::get('/', [SegmentController::class, 'index'])->name('index');
    Route::get('/create', [SegmentController::class, 'create'])->name('create');
    Route::post('/', [SegmentController::class, 'store'])->name('post');
    Route::get('/edit/{id}', [SegmentController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [SegmentController::class, 'update'])->name('post.update');
});
// Route::resource('/segment', SegmentController::class)->middleWare('auth');



// * Notifikasi 
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

Route::group(['prefix' => 'build', 'as' => 'build.', 'middleware' => ['auth']], function () {
    Route::get('/', [BuildController::class, 'index'])->name('get.home');
    Route::post('/', [BuildController::class, 'store'])->name('post');
    Route::put('/{id}', [BuildController::class, 'update'])->name('put');
    Route::delete('/{id}', [BuildController::class, 'delete'])->name('delete');
});





/*
*--------------------------------------------------------------------------
* Stock Routes
*--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'stock', 'as' => 'stock.', 'middleware' => ['auth']], function () {
    Route::get('/', [StockController::class, 'index'])->name('get.home');
    Route::post('/', [StockController::class, 'store'])->name('post.store');
    Route::put('/{id}', [StockController::class, 'put'])->name('put.detail');
    Route::delete('/{id}', [StockController::class, 'destroy'])->name('delete.detail');
});




/*
*--------------------------------------------------------------------------
* Auth IC Transaksi
*--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'transaction', 'as' => 'transaction.ic.', 'middleware' => ['auth']], function () {
    Route::get('/', [TransactionController::class, 'index'])->middleware("auth")->name("get.home");
    Route::get('/outbound', [TransactionController::class, 'viewOutbound'])->middleware("auth")->name("view.outbound");
    
    Route::get('/detail/grf/{code}', [TransactionController::class, 'show'])->middleware("auth")->name('get.detail.grf');

    // Route::get('/', [StockController::class, 'index'])->name('get.home');
    // Route::post('/', [StockController::class, 'store'])->name('post.store');
    // Route::put('/{id}', [StockController::class, 'put'])->name('put.detail');
    // Route::delete('/{id}', [StockController::class, 'destroy'])->name('delete.detail');
});






/*
*--------------------------------------------------------------------------
* Auth Warehouse Home
*--------------------------------------------------------------------------
*/          

// Route::group(['prefix' => 'warehouse', 'as' => 'warehouse.', 'excluded_middleware' => ['web']], function () {
    // Route::get('/master', [WarehouseController::class, 'index'])->name('get.master');
    // Route::get('/', [WarehouseTransactionController::class, 'index'])->name('get.home');
Route::group(['prefix' => 'warehouse', 'as' => 'warehouse.', 'middleware' => ['auth']], function () {
    Route::get('/request', [WarehouseTransactionController::class, 'viewRequest'])->name('get.request');
    Route::get('/return', [WarehouseTransactionController::class, 'indexReturn'])->name('get.return');
    Route::get('/', [WarehouseTransactionController::class, 'dashboard'])->name('get.dashboard');
    Route::get('/show/{id}', [WarehouseTransactionController::class, 'show'])->name("get.detail");
    Route::post('/import/excel', [WarehouseTransactionController::class, 'updateImport'])->name('importexcel');
    Route::get('/master', [WarehouseController::class, 'index'])->name('get.master');
});


// // Route::get('/warehouse', [WarehouseTransactionController::class, 'index'])->name('warehouse.get.request');
// Route::get('/warehouse-transfer', [WarehouseTransactionController::class, 'indexTransfer'])->middleware('auth')->name('get.warehouse.transfer');
// Route::post('/warehouse-transfer', [WarehouseTransactionController::class, 'storeGrfTransfer'])->middleware('auth')->name('post.warehouse.transfer');
// Route::get('/warehouse-transfer/{code}', [WarehouseTransactionController::class, 'createTransfer'])->middleware('auth')->name('get.warehouse.create');
// Route::post('/warehouse-transfer/{code}', [WarehouseTransactionController::class, 'storeTransfer'])->middleware('auth')->name('post.warehouse.create');
// Route::put('/warehouse-transfer', [WarehouseTransactionController::class, 'updateTransfer'])->middleware('auth')->name('put.warehouse.create');
// Route::delete('/warehouse-transfer/{code}', [WarehouseTransactionController::class, 'deleteTransfer'])->middleware('auth')->name('delete.warehouse.create');
Route::get('/warehousereturn/action/grf/{id}', [WarehouseTransactionController::class, 'showReturn'])->name('get.whreturn.show.action.grf');

// Route::post('/warehouse-transfer/pieces/{code}', [WarehouseTransactionController::class, 'storePiecesTransfer'])->middleware('auth')->name('post.warehouse.transfer.pieces');
// Route::post('/warehouse-transfer/bulk/{code}', [WarehouseTransactionController::class, 'storeBulkTransfer'])->middleware('auth')->name('post.warehouse.transfer.bulk');
/*
|--------------------------------------------------------------------------
| Warehouse Transfer Routes
|--------------------------------------------------------------------------
*/
Route::group([ 'prefix' => 'warehouse-transfer', 'as' => 'warehouse.transfer.', 'middleware' => ['auth'] ], function () {
    Route::get('/', [WarehouseTransactionController::class, 'indexTransfer'])->name('get.home');
    Route::get('/{code}', [WarehouseTransactionController::class, 'createTransfer'])->name('get.detail');
    Route::post('/', [WarehouseTransactionController::class, 'storeGrfTransfer'])->name('post');
    Route::post('/{code}', [WarehouseTransactionController::class, 'storeTransfer'])->name('post.detail');
    Route::post('/pieces/{code}', [WarehouseTransactionController::class, 'storePiecesTransfer'])->name('post.pieces');
    Route::post('/bulk/{code}', [WarehouseTransactionController::class, 'storeBulkTransfer'])->name('post.bulk');
    Route::put('/', [WarehouseTransactionController::class, 'updateTransfer'])->name('put');
    Route::put('/current-warehouse/{id}', [WarehouseTransactionController::class, 'updateCurrentWarehouseTransfer'])->name('put.current');
    Route::put('/warehouse-destination/{id}', [WarehouseTransactionController::class, 'updateWarehouseDestinationTransfer'])->name('put.destination');
    Route::delete('/{code}', [WarehouseTransactionController::class, 'deleteTransfer'])->name('delete');
});



/*
*--------------------------------------------------------------------------
* Auth User Home
*--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'request-form', 'as' => 'request.', 'middleware' => ['auth']], function () {
    Route::get('/', [UserTransactionController::class, 'index'])->name('get.home');
    Route::get('/show/{grf_code}', [UserTransactionController::class, 'create'])->name('get.detail');
    Route::get('/delete/{code}', [UserTransactionController::class, 'destroy'])->name("get.delete.item");
    Route::post('/', [UserTransactionController::class, 'storeCreateGrf'])->name("post.store.create.grf");
    Route::post('/add/item/{id}', [UserTransactionController::class, 'storeAddItem'])->name("post.add.item");
    Route::put('/warehouse/{id}', [UserTransactionController::class, 'changeWarehouse'])->name('put.update.warehouse');
    Route::put('/{id}', [UserTransactionController::class, 'changeStatusToSubmit'])->name('put.update.status');
    Route::get('/emergency/{grf_code}', [UserTransactionController::class, 'create'])->name('get.emergency.detail');
    Route::post('/emergency', [UserTransactionController::class, 'storeEmergencyGrf'])->name('post.store.create.emergency.grf');
    Route::put('/file/{id}', [UserTransactionController::class, 'putDocumentEmergencyGRF'])->name('put.update.file.emergency.request');
    Route::put('/delete/doc/{id}', [UserTransactionController::class, 'destroyDocument'])->name("get.delete.doc");
});






/*
|--------------------------------------------------------------------------
| Approval Routes
|--------------------------------------------------------------------------
*/
// Route::group(['prefix' => 'transaction/approve', 'as' => 'transaction.approve.', 'middleware' => ['auth'] ], function () {
//     Route::get('/pickup/{id}', [UserTransactionController::class, 'getApprovePickup'])->name("post.pickup");
//     Route::post('/WH', [WarehouseTransactionController::class, 'postApproveWH'])->name("post.WH");
//     Route::post('/return/WH', [WarehouseReturnController::class, 'postApproveReturnWH'])->name("post.return.WH");
//     Route::post('/IC', [TransactionController::class, 'postApproveIC'])->name("post.IC");
//     Route::post('/SJ', [TransactionController::class, 'postApproveSJ'])->name("post.SJ");
// });



/*
*--------------------------------------------------------------------------
* Approval Routes
*--------------------------------------------------------------------------
*/
Route::post('/transaction/approve/WH', [WarehouseTransactionController::class, 'postApproveWH'])->middleware("auth")->name("post.approve.WH");
Route::post('/transaction/approve/return/WH', [WarehouseReturnController::class, 'postApproveReturnWH'])->middleware("auth")->name("post.approve.return.WH");
Route::post('/transaction/approve/IC', [TransactionController::class, 'postApproveIC'])->name("post.approve.IC");
Route::post('/transaction/approve/SJ', [TransactionController::class, 'postApproveSJ'])->middleware("auth")->name("post.approve.SJ");
Route::get('/transaction/approve/pickup/{id}', [UserTransactionController::class, 'getApprovePickup'])->middleware("auth")->name("post.approve.pickup");





/*
*--------------------------------------------------------------------------
* Master 
*--------------------------------------------------------------------------
*/


Route::post('/warehouse-import', [WarehouseTransactionController::class, 'updateImport'])->name('importexcel');
Route::post('/warehouse-import-return', [WarehouseReturnController::class, 'updateImport'])->name('importexcelreturn');
Route::post('/warehouse-approv', [WarehouseTransactionController::class, 'store'])->name('inputsatuan');
Route::post('/warehouse-return/{id}', [WarehouseReturnController::class, 'store'])->name('returnsatuan');
// Route::post('/change-status/{id}', [WarehouseReturnController::class, 'changeStatus'])->name('changeStatus');

// Route::resource('/warehouse' , WarehouseController::class)-> ("auth");
/*
*--------------------------------------------------------------------------
* MINI STOCK 
*--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'mini-stock', 'as' => 'mini.stock.', 'middleware' => ['auth'] ], function () {
    Route::get('/', [MiniStockController::class, 'index'])->name("get");
});

Route::group(['prefix' => 'return', 'as' => 'return.', 'middleware' => ['auth'] ], function () {
    Route::get('/{code}', [UserTransactionController::class, 'showReturnStock'])->name("get.detail");
    Route::put('/{code}', [UserTransactionController::class, 'updateReturnStock'])->name("put.detail");
});

// return.get.detail

Route::post('/warehouse-import', [WarehouseTransactionController::class, 'updateImport'])->name('importexcel');
Route::post('/warehouse-import-return', [WarehouseReturnController::class, 'updateImport'])->name('importexcelreturn');
Route::post('/warehouse-approv', [WarehouseTransactionController::class, 'store'])->name('inputsatuan');
Route::post('/warehouse-return/{id}', [WarehouseReturnController::class, 'store'])->name('returnsatuan');
// Route::post('/change-status/{id}', [WarehouseReturnController::class, 'changeStatus'])->name('changeStatus');
/*
*--------------------------------------------------------------------------
* Return Stock
*--------------------------------------------------------------------------
*/
// Route::get('/return/{code}', [UserTransactionController::class, 'showReturnStock'])->middleware("auth")->name("get.show.return.stock");
// Route::put('/return/{code}', [UserTransactionController::class, 'updateReturnStock'])->middleware("auth")->name("put.show.return.stock");

// /*
// *--------------------------------------------------------------------------
// * Rekondisi
// *--------------------------------------------------------------------------
// */

// Route::get('/rekondisi', [RekondisiController::class, 'show'])->name('get.rekondisi')->middleware("auth");
// Route::put('/rekondisigood/{id}', [RekondisiController::class, 'update'])->name('post.rekondisi.good')->middleware("auth");
// // Route::put('/return/{code}', [UserTransactionController::class, 'updateReturnStock'])->middleware("auth")->name("put.show.return.stock");
// Route::get('/ajax/return/{code}', [UserTransactionController::class, 'ajaxReturnStock'])->middleware("auth");
// Route::post('/return/{id}', [UserTransactionController::class, 'updateReturnStock'])->middleware("auth")->name("put.show.return.stock");

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

