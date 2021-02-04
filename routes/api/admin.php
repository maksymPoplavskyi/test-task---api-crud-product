<?php

use App\Http\Controllers\Admin\CharacteristicController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/', [ProductController::class, 'index'])->name('admin.product.list');
Route::post('/create', [ProductController::class, 'create'])->name('admin.product.create');
Route::delete('/delete/{product_id}', [ProductController::class, 'delete'])->name('admin.product.delete');
Route::put('/update/{product_id}', [ProductController::class, 'update'])->name('admin.product.update');

Route::post('/characteristic/create', [CharacteristicController::class, 'create'])
    ->name('admin.characteristic.update');

Route::get('/search', [ProductController::class, 'search'])->name('admin.product.search');
