<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::post('actionLogin', [UserController::class, 'actionLogin']);
Route::get('logout', [UserController::class, 'logout']);

// Route::middleware(['adminlogin'])->group(function () {
//     //
// });

Route::prefix('wa-admin')->middleware('adminlogin')->group(function () {

    Route::view('/', 'admin/dashboard');
    Route::get('login', function () {
        return view('admin/login');
    });
    Route::get('manageprocats', [ProductController::class, 'getProcats']);
    Route::get('editprocats/{id}', [ProductController::class, 'getProcats']);
    Route::post('editprocats', [ProductController::class, 'editProcats']);
    Route::post('addprocats', [ProductController::class, 'addProcats']);
    Route::get('deleteprocat/{id}', [ProductController::class, 'dltProcat']);

    Route::get('addnewproduct', [ProductController::class, 'viewAddProduct']);
    Route::post('addproduct', [ProductController::class, 'addProduct']);
    Route::get('productlist', [ProductController::class, 'productList']);
    Route::get('modifyproduct/{id}', [ProductController::class, 'viewEditProduct']);
    
    
});