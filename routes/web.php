<?php

// models
use App\Models\User;
use App\Models\Warehouse;

// Facades
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryPriceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InboundController;
use App\Http\Controllers\MiniStockController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderInboundController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\RekondisiController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SegmentController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTransactionController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\WarehouseReturnController;
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

// Jangan di rubah
Route::post('/api/login', [AuthController::class, 'login'])->name('authJWTLogin');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/password', [ForgotPasswordController::class, 'edit']);
    Route::post('/forgot', [ForgotPasswordController::class, 'update'])->name('updatePassword');
});

Route::get('/', function () {
    return view('layout.app');
});

Route::get('/faq', function () {
    return view('faq.transaction');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', function () {
    return redirect()->to("/home");
});

Route::get('/suratjalan/{grf}', [TransactionController::class, 'ViewSuratJalanPDF'])->name('view.surat.jalan');
Route::get('/grf/{grf}', [TransactionController::class, 'ViewGRFPDF'])->name('view.grf.pdf');
Route::get('/home', [HomeController::class, 'index'])->name('home');

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
*|  Dashboard pages 
*|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth']], function () {
    Route::get('/stock', [DashboardController::class, 'stock'])->name('stock');
    Route::get('/inbound', [DashboardController::class, 'inbound'])->name('inbound');
    Route::get('/outbound', [DashboardController::class, 'outbound'])->name('outbound');
    Route::get('/build', [DashboardController::class, 'build'])->name('build');
    Route::get('/warehouse', [DashboardController::class, 'warehouse'])->name('warehouse');
});



/* 
*|--------------------------------------------------------------------------
*|  Master Routes 
*|--------------------------------------------------------------------------
*/
// * Part 
Route::group(['prefix' => 'part', 'as' => 'part.', 'middleware' => ['auth', 'InventoryControl']], function () {
    Route::get('/create', [PartController::class, 'create'])->name("create");
    Route::get('/', [PartController::class, 'index'])->name("view.home");
    Route::get('/create', [PartController::class, 'create'])->name("create");
    Route::get('/{id}', [PartController::class, 'show'])->name("get.detail");
    Route::get('/ajax', [PartController::class, 'ajaxIndex'])->name("get.ajax");
    Route::get('/tampilan/{id}', [PartController::class, 'tampilan'])->name("tampilan");
    Route::post('/deactive', [PartController::class, 'deactive'])->name('post.deactive');
    Route::post('/', [PartController::class, 'store'])->name("store");
    Route::get('/tampilan/{id}', [PartController::class, 'tampilan'])->name("tampilan");
    Route::put('/{id}', [PartController::class, 'update'])->name("put.part");
});

// * User 
Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth', 'InventoryControl']], function () {
    Route::get('/', [UserController::class, 'index'])->name("get.view");
    Route::get('/create', [UserController::class, 'create'])->name("get.create");
    Route::post('/store', [UserController::class, 'store'])->name("store");
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name("get.edit");
    Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::post('/status', [UserController::class, 'postStatus'])->name('post.status');
    // Route::get('/{id}', [PartController::class, 'show'])->name("get.detail");
    // Route::get('/ajax', [PartController::class, 'ajaxIndex'])->name("get.ajax");
});

Route::get('/master/user', [UserController::class, 'index'])->middleware("auth");
// Route::post('/master/user/deactive', [UserController::class, 'postDeactive'])->middleware("auth")->name("post.deactive.user");

// * Vendor
Route::group(['prefix' => 'vendor', 'as' => 'vendor.'], function () {
    Route::get('/', [VendorController::class, 'index'])->name('get.view')->middleware("auth");
    Route::get('/create', [VendorController::class, 'create'])->name('create')->middleware("auth");
    Route::post('/store', [VendorController::class, 'store'])->name('post.store')->middleware("auth");
    Route::get('/edit/{id}', [VendorController::class, 'edit'])->name('edit')->middleware("auth");
    Route::put('/update/{id}', [VendorController::class, 'update'])->name('post.update')->middleware("auth");
});

// * Brand 
Route::group(['prefix' => 'brand', 'as' => 'brand.', 'middleware' => ['auth', 'InventoryControl']], function () {
    Route::get('/', [BrandController::class, 'index'])->name('get.view')->middleware("auth");
    Route::get('/create', [BrandController::class, 'create'])->name('create');
    Route::post('/', [BrandController::class, 'store'])->name('post.store');
    Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [BrandController::class, 'update'])->name('post.update');
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
    Route::get('/return-stock', [TransactionController::class, 'returnStockIndex'])->name('get.return.stock');
    Route::post('/{id}', [TransactionController::class, 'returnStockStore'])->name('post.return.stock');

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
    Route::get('/', [WarehouseTransactionController::class, 'dashboard'])->name('get.dashboard');
    Route::get('/request', [WarehouseTransactionController::class, 'viewRequest'])->name('get.request');
    Route::get('/return', [WarehouseTransactionController::class, 'indexReturn'])->name('get.return');
    Route::get('/show/{id}', [WarehouseTransactionController::class, 'show'])->name("get.detail");
    Route::post('/import/excel', [WarehouseTransactionController::class, 'updateImport'])->name('importexcel');
    Route::get('master', [WarehouseController::class, 'index'])->name('get.view');
    Route::get('/create', [WarehouseController::class, 'create'])->name('create');
    Route::post('/', [WarehouseController::class, 'store'])->name('post.store');
    Route::get('/edit/{id}', [WarehouseController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [WarehouseController::class, 'update'])->name('post.update');
    Route::post('/status', [WarehouseController::class, 'postStatus'])->name('post.status');
    Route::get('/transfer', [WarehouseTransactionController::class, 'whtransfer'])->name('get.whtransfer');
    Route::get('/transfer/recipient', [WarehouseTransactionController::class, 'recipient'])->name('get.recipient');
    Route::get('/show/transfer/{id}', [WarehouseTransactionController::class, 'showWhTransfer'])->name('get.detailtransferapprov');
    Route::get('/show/recipient/{id}', [WarehouseTransactionController::class, 'showWhRecipient'])->name('get.detailWhRecipient');
    Route::post('/store/pieces/{id}', [WarehouseTransactionController::class, 'manualWhTransfer'])->name('post.storemanual');
    Route::post('/store/non-sn/{id}', [WarehouseTransactionController::class, 'storeNonSNRecipient'])->name('post.non-sn');
    Route::post('/store/bulk/{id}', [WarehouseTransactionController::class, 'bulkRecipient'])->name('post.bulkRecipient');
    Route::post('/submitStatus/{id}', [WarehouseTransactionController::class, 'submitStatus'])->name('post.changeStatus');
    Route::post('/submitRecipient/{id}', [WarehouseTransactionController::class, 'submitRecipient'])->name('post.changeRecipient');
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
Route::group(['prefix' => 'warehouse-transfer', 'as' => 'warehouse.transfer.', 'middleware' => ['auth']], function () {
    Route::get('/', [WarehouseTransactionController::class, 'indexTransfer'])->name('get.home');
    Route::get('/{code}', [WarehouseTransactionController::class, 'createTransfer'])->name('get.detail');
    Route::post('/', [WarehouseTransactionController::class, 'storeGrfTransfer'])->name('post');
    Route::post('/{code}', [WarehouseTransactionController::class, 'storeTransfer'])->name('post.detail');
    Route::post('/pieces/{code}', [WarehouseTransactionController::class, 'storePiecesTransfer'])->name('post.pieces');
    Route::post('/non-sn/{code}', [WarehouseTransactionController::class, 'storeNonSNTransfer'])->name('post.non-sn');
    Route::post('/bulk/{code}', [WarehouseTransactionController::class, 'storeBulkTransfer'])->name('post.bulk');
    Route::put('/', [WarehouseTransactionController::class, 'updateTransfer'])->name('put');
    Route::put('/current-warehouse/{id}', [WarehouseTransactionController::class, 'updateCurrentWarehouseTransfer'])->name('put.current');
    Route::put('/warehouse-destination/{id}', [WarehouseTransactionController::class, 'updateWarehouseDestinationTransfer'])->name('put.destination');
    Route::delete('/{code}', [WarehouseTransactionController::class, 'deleteTransfer'])->name('delete');
});



/*
*--------------------------------------------------------------------------
* PO Inbond 
*--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'inbound', 'as' => 'inbound.', 'middleware' => ['auth']], function(){
    Route::get('/', [InboundController::class, 'index'])->name('get.home');
    Route::get('/delete/{id}', [InboundController::class, 'delete'])->name("get.delete");   
    Route::post('/allup', [InboundController::class, 'allup'])->name('post.inbound.stock');
    Route::get('/excel', [InboundController::class, 'export'])->name('get.excel.template');
    Route::post('/import', [InboundController::class, 'import'])->name('post.excel.import');
    Route::delete('/deleted/{code}', [InboundController::class, 'destroy'])->name("delete.item");
    Route::put('/{id}', [InboundController::class, 'storeAddWarehouse'])->name('post.warehouse');
    Route::get('/show/{code}', [InboundController::class, 'create'])->name('get.detail');
    Route::post('/', [InboundController::class, 'storeCreateInboundgrf'])->name('post.store.grf');
});

Route::get('/inboundshow', function () {
    return view('stock.InboundShow');
});

/*
*--------------------------------------------------------------------------
* PO Inbond 
*--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'inbound', 'as' => 'inbound.', 'middleware' => ['auth']], function(){
    Route::get('/', [InboundController::class, 'index'])->name('get.home');
    Route::get('/delete/{id}', [InboundController::class, 'delete'])->name("get.delete");   
    Route::get('/excel', [InboundController::class, 'export'])->name('get.excel.template');
    Route::get('/show/{id}', [InboundController::class, 'create'])->name('get.detail');
    Route::get('/recipient', [InboundController::class, 'recipientIndex'])->name('get.recipient');
    Route::get('/recipient/{id}', [InboundController::class, 'recipientShow'])->name('get.recipient.detail');
    Route::post('/recipient/non-sn/{id}', [InboundController::class, 'recipientNonSnStore'])->name('post.non.sn.recipient');
    Route::post('/recipient/pieces/{id}', [InboundController::class, 'recipientPiecesStore'])->name('post.pieces.recipient');
    Route::post('/recipient/bulk/{id}', [InboundController::class, 'recipientBulkStore'])->name('post.bulk.recipient');
    Route::post('/', [InboundController::class, 'storeCreateInboundgrf'])->name('post.store.grf');
    Route::post('/add/item/{id}', [InboundController::class, 'storeAddItem'])->name("post.add.item");
    Route::post('/add/wh/{id}', [InboundController::class, 'storeAddWh'])->name("post.add.wh");
    Route::post('/allup', [InboundController::class, 'allup'])->name('post.inbound.stock');
    Route::post('/import', [InboundController::class, 'import'])->name('post.excel.import');
    // Route::put('/giver/{id}', [InboundController::class, 'giverSubmit'])->name('put.giver');
    Route::put('/recipient/{id}', [InboundController::class, 'recipientSubmit'])->name('put.recipient');
    Route::put('/current/{id}', [InboundController::class, 'updateCurrentWarehouse'])->name('put.current.warehouse');
    Route::put('/destination/{id}', [InboundController::class, 'updateWarehouseDestination'])->name('put.warehouse.destination');
    Route::put('/add/{id}', [InboundController::class, 'changeStatusToSubmit'])->name('put.update.status');
    Route::delete('/deleted/{code}', [InboundController::class, 'destroy'])->name("delete.item");
});

Route::get('/inboundshow', function () {
    return view('stock.InboundShow');
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



// Route Profile
Route::get('/profile', [UserController::class, 'indexProfile']);
// Route::get('/profile', function () {
//     return view('profile');
// });





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
Route::get('/transaction/reject/IC', [TransactionController::class, 'postRejectIC'])->middleware("auth")->name("post.reject.IC");
Route::post('/transaction/approve/SJ', [TransactionController::class, 'postApproveSJ'])->middleware("auth")->name("post.approve.SJ");
Route::get('/transaction/approve/pickup/{id}', [UserTransactionController::class, 'getApprovePickup'])->middleware("auth")->name("post.approve.pickup");



/*
*--------------------------------------------------------------------------
* Master 
*--------------------------------------------------------------------------
*/


// Route::post('/warehouse-import', [WarehouseTransactionController::class, 'updateImport'])->name('importexcel');
// Route::post('/warehouse-import-return', [WarehouseReturnController::class, 'updateImport'])->name('importexcelreturn');
// Route::post('/warehouse-approv', [WarehouseTransactionController::class, 'store'])->name('inputsatuan');
// Route::post('/warehouse-return/{id}', [WarehouseReturnController::class, 'store'])->name('returnsatuan');
// Route::post('/change-status/{id}', [WarehouseReturnController::class, 'changeStatus'])->name('changeStatus');

// Route::resource('/warehouse' , WarehouseController::class)-> ("auth");
/*
*--------------------------------------------------------------------------
* MINI STOCK 
*--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'mini-stock', 'as' => 'mini.stock.', 'middleware' => ['auth']], function () {
    Route::get('/', [MiniStockController::class, 'index'])->name("get");
});

Route::group(['prefix' => 'return', 'as' => 'return.', 'middleware' => ['auth']], function () {
    Route::get('/{code}', [UserTransactionController::class, 'showReturnStock'])->name("get.detail");
    Route::put('/{code}', [UserTransactionController::class, 'updateReturnStock'])->name("put.detail");
});

// return.get.detail
Route::group(['middleware' => ['auth']], function () {
    Route::post('/warehouse-import', [WarehouseTransactionController::class, 'updateImport'])->name('importexcel');
    Route::post('/warehouse-import-return', [WarehouseReturnController::class, 'updateImport'])->name('importexcelreturn');
    Route::post('/warehouse-approv/non-sn', [WarehouseTransactionController::class, 'storeNonSn'])->name('inputnonsn');
    Route::post('/warehouse-approv', [WarehouseTransactionController::class, 'store'])->name('inputsatuan');
    Route::post('/warehouse-return/{id}', [WarehouseReturnController::class, 'store'])->name('returnsatuan');
    Route::post('/warehouse-return', [WarehouseReturnController::class, 'storeReturnNonSn'])->name('returnnonsn');
});
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

Route::get('/notification', function () {
    return view('notification.notification');
});