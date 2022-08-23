<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controller\AttachmentController;

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

Route::get('/detail/part', [App\Http\Controllers\AttachmentController::class, 'index'])->name('index');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('/data', App\Http\Controllers\AttachmentController::class);

Route::post('/store', [App\Http\Controllers\AttachmentController::class, 'store']);
Route::get('/destroy/{id}', [App\Http\Controllers\AttachmentController::class, 'destroy']);

Route::apiResource('/attachments', App\Http\Controllers\AttachmentController::class);