<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UI\CountryController;
use App\Http\Controllers\UI\StateController;
/*
|--------------------------------------------------------------------------
| Web Routes b 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CountryController::class, 'index'])->name('HalamanCountry');
Route::get('/ajax_index', [CountryController::class, 'ajax_index'])->name('DataCountry');

Route::get('/state', [StateController::class, 'index'])->name('HalamanState');
Route::get('/state_state', [StateController::class, 'ajax_index'])->name('DataState');