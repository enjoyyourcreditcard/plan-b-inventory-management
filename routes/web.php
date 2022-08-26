<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HistoryPriceController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\WarehouseController;

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
    return view('welcome');
});


// Route::get('/part', function () {
//     return view('part.part');
// })->middleware(["auth:sanctum", 'ability:check-status']);


// Route::group(['prefix' => 'part', 'middleware' => 'auth:sanctum'], function () {
Route::resource('part', PartController::class);
Route::post('/historyprice', [App\Http\Controllers\HistoryPriceController::class, 'store'])->name('post.store.historyprice');

// Route::resource('/part', HistoryPriceController::class);



// Route::resource('/part', PartController::class, ['names' => 'users']);
// });



// Route::resource('/detail/part/{id}', HistoryPriceController::class);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route WareHouse
// Route::get('/warehouse', function(){
//     return view('warehouse.warehouse');
// });

Route::get('/warehouseDetail', function(){
    return view('warehouse.detail');
});

Route::get('/warehouse', [WarehouseController::class, 'index']);
Route::post('/warehouse', [WarehouseController::class, 'store']);
Route::get('/inActive/{id}', [WarehouseController::class, 'inActive']);
Route::put('/warehouse/{id}', [WarehouseController::class, 'update']);