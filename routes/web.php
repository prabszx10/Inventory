<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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

Route::controller(DashboardController::class)->name('dashboard.')->group(function () {
    Route::any('/', 'index')->name('index');
});

Route::controller(UserController::class)->name('user.')->prefix('user')->group(function () {
    $route = array('index', 'insert', 'update','select');  
    foreach ($route as $route) {
        Route::any('/'.$route, $route)->name($route);
    }
});

