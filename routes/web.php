<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HistoryPriceController;

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


Route::get('/part', [PartController::class, 'index'])->middleware(["auth:sanctum", 'ability:check-status']);


// Route::get('/detail/part', function () {
//     return view('part.detail');
// })->middleware(["auth:sanctum", 'ability:check-status']);
// Route::get('/detail/part', [App\Http\Controllers\HistorypriceController::class, 'index']);
// Route::resource('/detail/part/{id}', HistoryPriceController::class);


Route::get('/detail/part/{id}', [PartController::class, 'show'])->middleware(["auth:sanctum", 'ability:check-status']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/part', [PartController::class, 'store']);
Route::put('/part/{id}', [PartController::class, 'update']);
Route::post('/category', [CategoryController::class, 'store']);
Route::put('/category/{id}', [CategoryController::class, 'update']);
Route::get('/category/{id}', [CategoryController::class, 'delete']);

