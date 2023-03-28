<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HistoryBarangController;
use App\Http\Controllers\ErrorController;
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

Auth::routes();

Route::controller(ErrorController::class)->name('error.')->prefix('error')->group(function () {
    $route = array('access_denied');  
    foreach ($route as $route) {
        Route::any('/'.$route, $route)->name($route);
    }
});

Route::middleware(['user-check'])->group(function () {
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
        $route = array('index', 'insert', 'update','delete','select','selectFilter','export');  
        foreach ($route as $route) {
            Route::any($route=='index'?'':'/'.$route, $route)->name($route);
        }
    });
});
