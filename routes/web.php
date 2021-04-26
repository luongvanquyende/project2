<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\HistoryController;
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
    Route::get('/equipment', 'EquipmentController@index');
    Route::post('/equipment', 'EquipmentController@store');
    Route::get('/equipment/{slug}', 'EquipmentController@show');
    Route::post('/equipment/{slug}', 'EquipmentController@update');
    Route::delete('/equipment/{slug}', 'EquipmentController@destroy');

    Route::get('/zone', 'ZoneController@index');
    Route::post('/zone', 'ZoneController@store');

    Route::get('/history', 'HistoryController@index');
    Route::post('/history/{slug}', 'HistoryController@store');

    Route::get('/', function () {
        return redirect('/dashboard');
    });
    Route::get('/dashboard', [HomeController::class, 'index']);
});
