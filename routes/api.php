<?php

// use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\HistoryPriceController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\NotificationController;
use App\Models\User;

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
Route::group(['prefix' => 'auth', 'middleware' => 'auth:sanctum'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('logoutall', [AuthController::class, 'logoutall']);
});

Route::get('/tes123', function () {
    $user = User::all()->map(function($item){
        $item->umur = 2;
        return $item;
    });
    // foreach ($user as $item) {
    //     $item->umur = 1;
    // };
    // dd($user);
    return $user;
    // return Auth::user()->tokenCan('show-part');
});




Route::group(['prefix' => 'part'], function () {
    Route::get('/', [PartController::class, 'getAllPart']);
    Route::get('/delete/{id}', [PartController::class, 'getDeactivePart']);
});


Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'getAllCategory']);
    Route::get('/detail/{id}', [CategoryController::class, 'getCategoryById']);
    Route::get('/select', [CategoryController::class, 'getAllCategoryForSelect']);
    // Route::get('/delete/{id}', [PartController::class, 'getDeactivePart']);
});


Route::group(['prefix' => 'brand'], function () {
    Route::get('/', [BrandController::class, 'getAllBrand']);
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
// Route::prefix('detail')->group(function () {
//     Route::get('/part', [HistoryPriceController::class, 'getAllHistoryPrice']);
//     Route::post('/part', [HistoryPriceController::class, 'postStoreHistoryPrice']);
// });


// >>>>>>> origin/brand
// =======
// Route::group(['prefix' => 'part'], function () {
//     Route::get('/', [PartController::class, 'getAllPart']);
//     Route::get('/delete/{id}', [PartController::class, 'getDeactivePart']);
// });
// Route::prefix('detail')->group(function () {
//     Route::get('/part', [HistoryPriceController::class, 'getAllHistoryPrice']);
//     Route::post('/part', [HistoryPriceController::class, 'postStoreHistoryPrice']);
// });

