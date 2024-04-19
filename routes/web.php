<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('admin/dashboard', [\App\Http\Controllers\Admin\DashboardController::class,'index']);

//prefix ыг ашиглавал урд талд нь байнга бичдэг угтвар үгийг хялбар бичих боломжтой

Route::prefix('admin')->group(function () {
   Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class,'index']);

   Route::controller(\App\Http\Controllers\Admin\CategoryController::class)->group(function () {
       Route::get('/category', 'index');
       Route::get('/category/create','create');
       Route::post('category','store');
       Route::get('category/edit/{id}','edit');
       Route::put('category/{id}', 'update');
   });


   Route::controller(\App\Http\Controllers\Admin\SubCategoryController::class)->group(function(){
    Route::get('subcategory','index');
    Route::get('subcategory/create','create');
    Route::post('subcategory','store');
    Route::get('subcategory/edit/{id}','edit');
    Route::put('subcategory/{id}', 'update');
   });
});
