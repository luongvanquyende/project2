<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Auth::routes();




// landing
Route::group(['middleware' => 'auth'], function () {
    Route::resource('equipment/', EquipmentController::class);
    // Route::resource('zone/', ZoneController::class);
    // Route::resource('history/', HistoryController::class);
    // Route::resource('environment/', EnvironmentController::class);

    Route::get('/', function () {
        return redirect('/dashboard');
    });
    Route::get('/dashboard', [HomeController::class, 'index']);
});
