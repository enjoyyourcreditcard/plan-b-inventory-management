<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartController;

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


Route::get('/part', function () {
    return view('part.part');
})->middleware(["auth:sanctum", 'ability:check-status']);


// Route::get('/detail/part', function () {
//     return view('part.detail');
// })->middleware(["auth:sanctum", 'ability:check-status']);

Route::get('/detail/part/{id}', [PartController::class, 'show'])->middleware(["auth:sanctum", 'ability:check-status']);
Route::put('/part/{id}', [PartController::class, 'update']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/part', [PartController::class, 'store']);
