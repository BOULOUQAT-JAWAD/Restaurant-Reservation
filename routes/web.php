<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\MenuController;
use \App\Http\Controllers\ReservationController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\AccountController;
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
    return view('master.home');
});
/*
 * Clients routes
 */
Route::post('/account/check',[AccountController::class,'check'])->name('account.check');
Route::group(['middleware'=>'AccountCheck'],function(){
//    Route::get('/account/dashboard',[AccountController::class,'dashboard'])->name('account.dashboard');
    Route::get('/account/login',[AccountController::class,'login'])->name('account.login');
    Route::get('/account/logout',[AccountController::class,'logout'])->name('account.logout');
    Route::get('/reservation/create',[ReservationController::class,'create']);
});
Route::resource('/account',AccountController::class);
/*
 * reservation
 */
Route::post('reservation',[ReservationController::class,'store']);
/*
 * Admin routes
 */
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
Route::post('/admin/check',[AdminController::class,'check'])->name('admin.check');
Route::group(['middleware'=>'AdminCheck'],function(){
    Route::get('/admin/dashboard',[AdminController::class,'index']);
    Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');
    Route::get('reservation',[ReservationController::class,'index']);
    Route::get('reservation/{reservation}/edit',[ReservationController::class,'edit']);
    Route::get('reservation/{reservation}',[ReservationController::class,'show']);
    Route::DELETE('reservation/{reservation}',[ReservationController::class,'destroy']);
});

Route::resource('category',CategoryController::class);
Route::resource('menu',MenuController::class);
