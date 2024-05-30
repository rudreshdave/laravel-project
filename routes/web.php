<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;


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

Route::get('export-products', [ProductController::class, 'showExportForm'])->name('export.products.form');
Route::get('export', [ProductController::class, 'export'])->name('export.products');