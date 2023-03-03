<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HistoryBarangController;
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

Route::controller(DashboardController::class)->group(function () {
    Route::any('/', 'index');
});

Route::controller(UserController::class)->name('user.')->prefix('user')->group(function () {
    $route = array('index', 'insert', 'update','select');  
    foreach ($route as $route) {
        Route::any($route=='index'?'':'/'.$route, $route)->name($route);
    }
});

Route::controller(BarangController::class)->name('barang.')->prefix('barang')->group(function () {
    $route = array('index', 'insert', 'update','delete','select');  
    foreach ($route as $route) {
        Route::any($route=='index'?'':'/'.$route, $route)->name($route);
    }
});

Route::controller(HistoryBarangController::class)->name('history_barang.')->prefix('history_barang')->group(function () {
    $route = array('index', 'insert', 'update','delete','select','selectFilter');  
    foreach ($route as $route) {
        Route::any($route=='index'?'':'/'.$route, $route)->name($route);
    }
});



