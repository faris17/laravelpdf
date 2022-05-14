<?php

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
