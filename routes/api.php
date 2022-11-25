<?php

// use App\Http\Controllers\AuthController;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\HistoryPriceController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SegmentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseTransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('logoutall', [AuthController::class, 'logoutall']);

Route::group(['prefix' => 'auth', 'middleware' => 'auth:sanctum'], function () {
    // Route::post('logout', [AuthController::class, 'logout']);
    // Route::post('logoutall', [AuthController::class, 'logoutall']);
});

Route::get('/tes123', function (Request $req) {

    AuthPermission("part:view");
    // dd(
    // dd(Auth::user()->token);
    // dd($req->user()->tokenCan("show-part"));
    // dd(auth('sanctum')->tokenCan("show-part"));
})->middleware('auth');




Route::group(['prefix' => 'part'], function () {
    Route::get('/', [PartController::class, 'getAllPart']);
    Route::get('/segment/{id}', [PartController::class, 'getAllPartBySegment']);
    Route::get('/delete/{id}', [PartController::class, 'getDeactivePart']);
});


Route::group(['prefix' => 'segment'], function () {
    Route::get('/', [SegmentController::class, 'getAllSegment']);
    Route::get('/category/{id}', [SegmentController::class, 'getAllSegementByCategory']);
});


Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'getAllCategory']);
    Route::get('/detail/{id}', [CategoryController::class, 'getCategoryById']);
    Route::get('/select', [CategoryController::class, 'getAllCategoryForSelect']);
    // Route::get('/delete/{id}', [PartController::class, 'getDeactivePart']);
});


Route::group(['prefix' => 'brand'], function () {
    Route::get('/', [BrandController::class, 'getAllBrand']);
    Route::get('/segement/{id}', [BrandController::class, 'getBrandBySegment']);
    Route::post('/', [BrandController::class, 'postStoreBrand']);
    Route::put('/{id}', [BrandController::class, 'putUpdateBrand']);
    Route::get('/select', [BrandController::class, 'getAllBrandForSelect']);

    Route::get('/delete/{id}', [BrandController::class, 'getDeactiveBrand']);
});

Route::group(['prefix' => 'stock'], function () {
    Route::get('/', [StockController::class, 'getAllStock']);
    Route::post('/', [StockController::class, 'postStoreStock']);
    Route::put('/{id}', [StockController::class, 'putUpdateStock']);
    Route::delete('/{id}', [StockController::class, 'getDeleteStock']);
});



Route::group(['prefix' => 'warehouse'], function () {
    Route::get('/', [WarehouseController::class, 'getAllWarehouse']);
    Route::get('/all/request/{id}', [WarehouseTransactionController::class, 'apiRequest']);
    Route::get('/all/return/{id}', [WarehouseTransactionController::class, 'apiReturn']);
    Route::get('/all/detail/transfer/{id}', [WarehouseTransactionController::class, 'apiDetailWhtransfer']);
    Route::get('/all/detail/recipient/{id}', [WarehouseTransactionController::class, 'apiRecipient']);
    Route::get('/all/warehouse/transfer/{warehouse_id}', [WarehouseTransactionController::class, 'apiTransfer']);
    Route::get('/all/warehouse/recipient/{warehouse_destination}', [WarehouseTransactionController::class, 'listRecipient']);

    
});

Route::group(['prefix' => 'build'], function () {
    Route::get('/', [BuildController::class, 'getAllBuild']);
});



Route::group(['prefix' => 'notification'], function () {
    Route::get('/', [NotificationController::class, 'getAllNotification']);
    Route::post('/', [NotificationController::class, 'postStoreNotification']);
    Route::put('/{id}', [NotificationController::class, 'putUpdateNotification']);
    Route::delete('/{id}', [NotificationController::class, 'getDeleteNotification']);
});

Route::group(['prefix' => 'request'], function () {
    Route::get('/', [RequestController::class, 'getAllRequest']);
    Route::post('/', [RequestController::class, 'postStoreRequest']);
    Route::put('/{id}', [RequestController::class, 'putUpdateRequest']);
    Route::delete('/{id}', [RequestController::class, 'getInactiveRequest']);
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'getAllUser']);
});




Route::group(['prefix' => 'grf'], function () {
    // Route::get('/warehouse', [WarehouseTransactionController::class, 'getAllWarehouseApproval']);
    Route::get('/brand/list/{code}', [TransactionController::class, 'getAllBrandListByGRF']);
    Route::get('/stock/list/{code}', [TransactionController::class, 'getAllStockListByGRF']);
    Route::get('/request/list/{code}', [TransactionController::class, 'getAllSegmentByGRF']);
    Route::get('/all/outbound', [TransactionController::class, 'getAllGRFOutbound']);
    Route::get('return-stock', [TransactionController::class, 'getAllGRFReturnStock']);


    // Route::get('/stock/list/{code}', [TransactionController::class, 'getAllStockListByGRF']);

});






// Route::prefix('detail')->group(function () {
//     Route::get('/part', [HistorypriceController::class, 'getAllHistoryprice']);
//     Route::post('/part', [HistorypriceController::class, 'postStoreHistoryprice']);
// });


// >>>>>>> origin/brand
// =======
// Route::group(['prefix' => 'part'], function () {
//     Route::get('/', [PartController::class, 'getAllPart']);
//     Route::get('/delete/{id}', [PartController::class, 'getDeactivePart']);
// });
// Route::prefix('detail')->group(function () {
//     Route::get('/part', [HistorypriceController::class, 'getAllHistoryprice']);
//     Route::post('/part', [HistorypriceController::class, 'postStoreHistoryprice']);
// });
