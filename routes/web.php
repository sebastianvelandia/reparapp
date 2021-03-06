<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TallerController;
use App\Http\Controllers\CallCenterController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdenController;
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
    return view('auth.main');
});

Route::get('/orden/consultar', function () {
    return view('orden.consultar');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    //Route::get('/', [ClienteController::class, 'index'])->name('home');

    Route::resource('user', UserController::class);
 
    Route::resource('orden', OrdenController::class);

    Route::resource('taller', TallerController::class);

    Route::resource('callcenter', CallCenterController::class);

    Route::resource('cliente', ClienteController::class);

    Route::resource('producto', ProductoController::class);

});