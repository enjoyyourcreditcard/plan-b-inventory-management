<?php
// Models
use App\Models\User;
use App\Models\Warehouse;

// Facades
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SegmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MiniStockController;
use App\Http\Controllers\RekondisiController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\HistoryPriceController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserTransactionController;
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
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Jangan di rubah
Route::post('/api/login', [AuthController::class, 'login'])->name('login');

Route::get('/', function () {
    return view('layout.app');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect()->to("/home");
});



/* 
|--------------------------------------------------------------------------
|  Part Routes 
|--------------------------------------------------------------------------
*/
Route::group([ 'prefix' => 'part', 'as' => 'part.', 'middleware' => ['auth'] ], function () {
    Route::get('/', [PartController::class, 'index'])->name("get.home");
    Route::get('/{id}', [PartController::class, 'show'])->name("get.detail");
    Route::get('/ajax', [PartController::class, 'ajaxIndex'])->name("get.ajax");
    Route::get('/deactive/{id}', [PartController::class, 'deactive'])->name('get.deactive');
    Route::post('/', [PartController::class, 'store'])->name("post");
});



/* 
|--------------------------------------------------------------------------
|  Category Routes 
|--------------------------------------------------------------------------
*/
Route::group([ 'prefix' => 'category', 'as' => 'category.', 'middleware' => ['auth'] ], function () {
    Route::get('/{id}', [CategoryController::class, 'show'])->name('get.detail');
    Route::post('/', [CategoryController::class, 'store'])->name('post');
    Route::post('/update', [CategoryController::class, 'update'])->name('post.update');
});



/* 
|--------------------------------------------------------------------------
|  Segment Routes 
|--------------------------------------------------------------------------
*/
Route::group([ 'prefix' => 'segment', 'as' => 'segment.', 'middleware' => ['auth'] ], function () {
    Route::resource('/', SegmentController::class, [ 'name' => [ 'store' => 'post' ]]);
});



/* 
|--------------------------------------------------------------------------
|  Brand Routes 
|--------------------------------------------------------------------------
*/
Route::group([ 'prefix' => 'brand', 'as' => 'brand.', 'middleware' => ['auth'] ], function () {
    Route::post('/', [BrandController::class, 'store'])->name('post');
    Route::post('/update', [CategoryController::class, 'update'])->name('post.update');
});



/* 
|--------------------------------------------------------------------------
|  Stock Routes 
|--------------------------------------------------------------------------
*/
Route::group([ 'prefix' => 'stock', 'as' => 'stock.', 'middleware' => ['auth'] ], function () {
    Route::get('/', [StockController::class, 'index'])->name('get.home');
    Route::post('/', [StockController::class, 'store'])->name('post');
    Route::put('/{id}', [StockController::class, 'put'])->name('put.detail');
    Route::delete('/{id}', [StockController::class, 'destroy'])->name('delete.detail');
});



/*
|--------------------------------------------------------------------------
| Build Routes
|--------------------------------------------------------------------------
*/
Route::group([ 'prefix' => 'build', 'as' => 'build.', 'middleware' => ['auth'] ], function () {
    Route::get('/', [BuildController::class, 'index'])->name('get.home');
    Route::post('/', [BuildController::class, 'store'])->name('post');
    Route::put('/{id}', [BuildController::class, 'update'])->name('put');
    Route::delete('/{id}', [BuildController::class, 'delete'])->name('delete');
});



/* 
|--------------------------------------------------------------------------
|  History Price Routes 
|--------------------------------------------------------------------------
*/
Route::group([ 'prefix' => 'historyprice', 'as' => 'historyprice.', 'middleware' => ['auth'] ], function () {
    Route::post('/', [HistoryPriceController::class, 'store'])->name('post');
});



/* 
|--------------------------------------------------------------------------
|  Notification Routes 
|--------------------------------------------------------------------------
*/
Route::group([ 'prefix' => 'notification', 'as' => 'notification.', 'middleware' => ['auth'] ], function () {
    Route::get('/', [NotificationController::class, 'index'])->name('get.home');
    Route::get('/delete/{id}', [NotificationController::class, 'destroy'])->name('post.delete');
});



/* 
|--------------------------------------------------------------------------
|  Attactment Routes 
|--------------------------------------------------------------------------
*/
Route::group([ 'prefix' => 'attachment', 'as' => 'attachment.', 'middleware' => ['auth'] ], function () {
    Route::post('/', [AttachmentController::class, 'store'])->name('post');
});



/*
|--------------------------------------------------------------------------
| Auth Warehouse Routes
|--------------------------------------------------------------------------
*/
Route::group([ 'prefix' => 'warehouse', 'as' => 'warehouse.', 'middleware' => ['auth'] ], function () {
    Route::get('/', [WarehouseTransactionController::class, 'index'])->name('get.home');
    Route::get('/show/{id}', [WarehouseTransactionController::class, 'show'])->name("get.detail");
    Route::post('/import/excel', [WarehouseTransactionController::class, 'updateImport'])->name('importexcel');
});



/*
|--------------------------------------------------------------------------
| Warehouse Transfer Routes
|--------------------------------------------------------------------------
*/
Route::group([ 'prefix' => 'warehouse-transfer', 'as' => 'warehouse.transfer', 'middleware' => ['auth'] ], function () {
    Route::get('/', [WarehouseTransactionController::class, 'indexTransfer'])->name('get.home');
    Route::get('/{code}', [WarehouseTransactionController::class, 'createTransfer'])->name('get.detail');
    Route::post('/', [WarehouseTransactionController::class, 'storeGrfTransfer'])->name('post');
    Route::post('/{code}', [WarehouseTransactionController::class, 'storeTransfer'])->name('post.detail');
    Route::post('/pieces/{code}', [WarehouseTransactionController::class, 'storePiecesTransfer'])->name('post.pieces');
    Route::post('/bulk/{code}', [WarehouseTransactionController::class, 'storeBulkTransfer'])->name('post.bulk');
    Route::put('/', [WarehouseTransactionController::class, 'updateTransfer'])->name('put');
    Route::delete('/{code}', [WarehouseTransactionController::class, 'deleteTransfer'])->name('delete');
});



/*
|--------------------------------------------------------------------------
|  User Good Request Form Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'request', 'as' => 'request.', 'middleware' => ['auth'] ], function () {
    Route::get('/', [UserTransactionController::class, 'index'])->name('get.home');
    Route::get('/{code}', [UserTransactionController::class, 'create'])->name('get.detail');
    Route::get('/delete/{code}', [UserTransactionController::class, 'destroy'])->name("get.delete.item");
    Route::post('/', [UserTransactionController::class, 'storeCreateGrf'])->name("post.store.create.grf");
    Route::post('/add/item/{id}', [UserTransactionController::class, 'storeAddItem'])->name("post.add.item");
    Route::put('/warehouse/{id}', [UserTransactionController::class, 'changeWarehouse'])->name('put.update.warehouse');
    Route::put('/{id}', [UserTransactionController::class, 'changeStatusToSubmit'])->name('put.update.status');
});



/*
|--------------------------------------------------------------------------
| Approval Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'transaction/approve', 'as' => 'transaction.approve.', 'middleware' => ['auth'] ], function () {
    Route::get('/pickup/{id}', [UserTransactionController::class, 'getApprovePickup'])->name("post.pickup");
    Route::post('/WH', [WarehouseTransactionController::class, 'postApproveWH'])->name("post.WH");
    Route::post('/return/WH', [WarehouseReturnController::class, 'postApproveReturnWH'])->name("post.return.WH");
    Route::post('/IC', [TransactionController::class, 'postApproveIC'])->name("post.IC");
    Route::post('/SJ', [TransactionController::class, 'postApproveSJ'])->name("post.SJ");
});



/*
|--------------------------------------------------------------------------
| Master User Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'master/user', 'as' => 'master.user.', 'middleware' => ['auth'] ], function () {
    Route::get('/', [UserController::class, 'index'])->name("get.home");
    Route::post('/deactive', [UserController::class, 'postDeactive'])->name("post.deactive");
});



/*
|--------------------------------------------------------------------------
| Mini Stock Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'mini-stock', 'as' => 'mini.stock.', 'middleware' => ['auth'] ], function () {
    Route::get('/', [MiniStockController::class, 'index'])->name("get.home");
});



/*
|--------------------------------------------------------------------------
| Warehouse Import Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function () {
    Route::post('/warehouse-import', [WarehouseTransactionController::class, 'updateImport'])->name('importexcel');
    Route::post('/warehouse-import-return', [WarehouseReturnController::class, 'updateImport'])->name('importexcelreturn');
    Route::post('/warehouse-approv', [WarehouseTransactionController::class, 'store'])->name('inputsatuan');
    Route::post('/warehouse-return/{id}', [WarehouseReturnController::class, 'store'])->name('returnsatuan');
    Route::post('/change-status/{id}', [WarehouseReturnController::class, 'changeStatus'])->name('changeStatus');
});



/*
|--------------------------------------------------------------------------
| Return Stock Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'return', 'as' => 'return.', 'middleware' => ['auth'] ], function () {
    Route::get('/{code}', [UserTransactionController::class, 'showReturnStock'])->name("get.detail");
    Route::put('/{code}', [UserTransactionController::class, 'updateReturnStock'])->name("put.detail");
});



/*
|--------------------------------------------------------------------------
| Rekondition Routes
|--------------------------------------------------------------------------
*/
Route::group(['as' => 'rekodisi.', 'middleware' => ['auth'] ], function () {
    Route::get('/rekondisi', [RekondisiController::class, 'show'])->name('get.home');
    Route::put('/rekondisigood/{id}', [RekondisiController::class, 'update'])->name('put.good');
});



/*
|--------------------------------------------------------------------------
| MISC Routes
|--------------------------------------------------------------------------
*/
Route::get('/suratjalan/{grf}', [TransactionController::class, 'ViewSuratJalanPDF'])->name('view.surat.jalan');

Route::get('/detail/grf/{code}', [TransactionController::class, 'show'])->middleware("auth")->name('get.detail.grf');

Route::get('/transaction', [TransactionController::class, 'index'])->middleware("auth")->name("view.IC.transaction");

Route::get('/warehousereturn/action/grf/{id}', [WarehouseTransactionController::class, 'showReturn'])->name('get.whreturn.show.action.grf');
