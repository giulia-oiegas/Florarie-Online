<?php

use App\Http\Controllers\BuchetController;
use App\Http\Controllers\EvenimentController;
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

Route::get('/', [BuchetController::class, 'index']);

// Pentru funcția bonus
Route::get('/export-buchete', [BuchetController::class, 'export'])->name('buchete.export');

//ruta pt evenimente
Route::resource('evenimente', EvenimentController::class);

//aceasta linie creeaza toate rutele de crud
Route::resource('buchete', BuchetController::class);

Route::post(
    '/buchete/{id}/recenzii',
    [BuchetController::class, 'storeRecenzie']
)->name('buchete.recenzii.store');
