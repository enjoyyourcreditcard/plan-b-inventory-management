<?php

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

use App\Http\Controllers\PartController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RequestFormController;
use App\Http\Controllers\HistoryPriceController;
use App\Http\Controllers\WarehouseApprovController;

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
    return redirect()->to("/home");

});


// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/me', function (Request $request) {
//         return Auth::user()->tokens;
//     });
// });


// Route::get('/part', function () {
//     return view('part.part');
// })->middleware(["auth:sanctum", 'ability:check-status']);   


/*
|--------------------------------------------------------------------------
| Part Routes
|--------------------------------------------------------------------------
*/
Route::resource('/part' , PartController::class)->middleware("auth");

Route::get('/ajax/part' , [PartController::class, 'ajaxIndex'])->middleware("auth");
Route::post('/historyprice', [App\Http\Controllers\HistoryPriceController::class, 'store'])->name('post.store.historyprice')->middleware("auth");
Route::post('/brand', [BrandController::class, 'store'])->name('post.store.brand')->middleware("auth");
Route::get('/stock', [StockController::class, 'index'])->middleware("auth");
Route::post('/stock', [StockController::class, 'store'])->name('post.store.stock')->middleware("auth");
Route::put('/stock/{id}', [StockController::class, 'put'])->name('put.update.stock')->middleware("auth");
Route::delete('/stock/{id}', [StockController::class, 'destroy'])->name('delete.destroy.stock')->middleware("auth");

Route::post('/brand/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('post.update.brand')->middleware("auth");
Route::get('/part/deactive/{id}', [App\Http\Controllers\PartController::class, 'deactive'])->name('post.deactive.part')->middleware("auth");


Route::post('/attachment', [AttachmentController::class, 'store'])->name('post.store.attachment')->middleware("auth");
Route::post('/category', [CategoryController::class, 'store'])->name('post.store.category')->middleware("auth");
Route::get('/category/{id}', [CategoryController::class, 'show'])->middleware("auth");
Route::post('/category/update', [CategoryController::class, 'update'])->name('post.update.category')->middleware("auth");


Route::get('/notification/delete/{id}', [NotificationController::class, 'destroy'])->name('post.delete.notif')->middleware("auth");
Route::get('/notification', [NotificationController::class, 'index'])->name('get.index.notif')->middleware("auth");





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





/*
|--------------------------------------------------------------------------
| Transactions
|--------------------------------------------------------------------------
*/
Route::get('/request-form', [RequestFormController::class, 'index'])->middleware('auth');
Route::post('/request-form', [RequestFormController::class, 'store'])->middleware('auth');





/*
|--------------------------------------------------------------------------
| Approval
|--------------------------------------------------------------------------
*/
Route::get('/warehouse-approv', [WarehouseApprovController::class, 'index']);
Route::get('/warehouse-approv/{id}', [WarehouseApprovController::class, 'show']);
Route::put('/warehouse-approv', [WarehouseApprovController::class, 'update']);
