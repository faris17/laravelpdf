<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('user', [UserController::class, 'index']);
Route::get('generatepdf', [UserController::class, 'generatepdf'])->name('user.pdf');

//upload atau import
Route::post('user-import', [UserController::class, 'import'])->name('user.import');
//export excel
Route::get('user-export', [UserController::class, 'export'])->name('user.export');

Route::get('formupload', [UploadController::class, 'index'])->name('formupload.user');
Route::post('upload', [UploadController::class, 'upload'])->name('upload.user');

Route::get('register', [UserController::class, 'register'])->name('user.register');
Route::post('postregister', [UserController::class, 'store'])->name('user.store');

Route::get('product/{id}', [UserController::class, 'getproduct'])->name('user.product');

Route::get('product',[ProductController::class, 'index'])->name('product.ajax');
