<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropdownController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/display-data', [DropdownController::class , 'display_data']);
Route::post('/getstate', [DropdownController::class , 'getstate']);
Route::post('/getcity', [DropdownController::class , 'getcity']);
