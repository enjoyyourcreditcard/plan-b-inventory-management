<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HistoryPriceController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BuildController;
use Illuminate\Support\Facades\App;

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


/*
|--------------------------------------------------------------------------
| Part Routes
|--------------------------------------------------------------------------
*/
Route::resource('part', PartController::class)->middleware("auth");
Route::post('/historyprice', [HistoryPriceController::class, 'store'])->name('post.store.historyprice')->middleware("auth");
Route::post('/brand', [BrandController::class, 'store'])->name('post.store.brand')->middleware("auth");
Route::post('/brand/update', [CategoryController::class, 'update'])->name('post.update.brand')->middleware("auth");
Route::get('/part/deactive/{id}', [PartController::class, 'deactive'])->name('post.deactive.part')->middleware("auth");



Route::post('/attachment', [AttachmentController::class, 'store'])->name('post.store.attachment')->middleware("auth");
Route::post('/category', [CategoryController::class, 'store'])->name('post.store.category')->middleware("auth");
Route::post('/category/update', [CategoryController::class, 'update'])->name('post.update.category')->middleware("auth");





// Route::post('/category', [CategoryController::class, 'store'])->name('post.store.category');





// Route::resource('/brand', BrandController::class);
// Route::post('/brand/deactive/{id}', [BrandController::class, 'postDeactive']);



/*
|--------------------------------------------------------------------------
| Build Routes
|--------------------------------------------------------------------------
*/
Route::get('/build', [BuildController::class, 'index']);
Route::post('/build', [BuildController::class, 'store']);
Route::put('/build/{id}', [BuildController::class, 'update']);
Route::delete('/build/{id}', [BuildController::class, 'delete']);






/*
|--------------------------------------------------------------------------
| Stock Routes
|--------------------------------------------------------------------------
*/

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
