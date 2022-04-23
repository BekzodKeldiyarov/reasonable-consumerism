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
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
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
Route::get('/goods/bottle/{bottle}/edit', [App\Http\Controllers\GoodController::class, 'editBottle'])->name('goods.bottle.edit');
Route::patch('/goods/bottle/update', [App\Http\Controllers\GoodController::class, 'updateBottle'])->name('goods.bottle.update');


Route::get('/goods/packages/', [App\Http\Controllers\PackageController::class, 'index'])->name('packages.index');
Route::get('/goods/packages/create', [App\Http\Controllers\PackageController::class, 'create'])->name('packages.create');
Route::post('/goods/packages/create', [App\Http\Controllers\PackageController::class, 'store'])->name('packages.store');
Route::get('/goods/packages/{package}/edit', [App\Http\Controllers\PackageController::class, 'edit'])->name('packages.edit');
Route::patch('/goods/packages/update', [App\Http\Controllers\PackageController::class, 'update'])->name('packages.update');

Route::get('/goods/meats', [App\Http\Controllers\MeatController::class, 'index'])->name('meats.index');
Route::get('/goods/meats/create', [App\Http\Controllers\MeatController::class, 'create'])->name('meats.create');
Route::post('/goods/meats/create', [App\Http\Controllers\MeatController::class, 'store'])->name('meats.store');
Route::get('/goods/meats/{meat}/edit', [App\Http\Controllers\MeatController::class, 'edit'])->name('meats.edit');
Route::patch('/goods/meats/update', [App\Http\Controllers\MeatController::class, 'update'])->name('meats.update');


Route::get('admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('users.profile.show');
//});
