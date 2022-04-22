<?php

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


require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/admin/index', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');

//Route::middleware('auth')->group(function () {
Route::get("/goods", [App\Http\Controllers\GoodController::class, 'index'])->name('goods.index');
Route::get('/admin/plastic', [\App\Http\Controllers\PlasticController::class, 'index'])->name('plastic.index');
Route::get('/admin/{good}/edit', [\App\Http\Controllers\GoodController::class, 'edit'])->name('goods.edit');

Route::get('/goods/new', [App\Http\Controllers\GoodController::class, 'create'])->name('goods.create');

Route::post('/goods/new', [App\Http\Controllers\GoodController::class, 'store'])->name('goods.store');

Route::get('/goods/bottle/index', [App\Http\Controllers\GoodController::class, 'indexBottle'])->name('goods.bottle.index');
Route::get('/goods/bottle/new', [App\Http\Controllers\GoodController::class, 'createBottle'])->name('goods.bottle.create');
Route::post('/goods/bottle/new', [App\Http\Controllers\GoodController::class, 'storeBottle'])->name('goods.bottle.store');
Route::get('goods/bottle/{post_id}/edit', [App\Http\Controllers\GoodController::class, 'editBottle'])->name('goods.bottle.edit');

//});
