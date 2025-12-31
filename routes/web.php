<?php

use App\Http\Controllers\BuchetController;
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

Route::get('/', function () {
    return view('welcome');
});
// Pentru funcția bonus
Route::get('/export-buchete', [BuchetController::class, 'export'])->name('buchete.export'); 

//aceasta linie creeaza toate rutele de crud
Route::resource('buchete', BuchetController::class);
