<?php

use App\Http\Controllers\AlternativeTransportController;
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\GoByController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\MeatController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PrivateTransportController;
use App\Http\Controllers\PublicTransportController;
use App\Http\Controllers\UserController;
use App\Models\AlternativeTransport;
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

Route::middleware('auth')->group(function () {

    Route::get('admin/users/{user}/profile', [UserController::class, 'show'])->name('users.profile.show');

//Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('admin/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/consumes/bottle/create', [ConsumerController::class, 'addBottleConsume'])->name('consumes.bottle.new');
    Route::post('/consumes/bottle/store', [ConsumerController::class, 'storeBottleConsume'])->name('consumes.bottle.store');
    Route::get('/consumes/bottle/edit', [ConsumerController::class, 'editBottleConsume'])->name('consumes.bottle.edit');
    Route::patch('/consumes/bottle/update', [ConsumerController::class, 'updateBottleConsume'])->name('consumes.bottle.update');
    Route::delete('/consumes/bottle/destroy', [ConsumerController::class, 'destroyBottleConsume'])->name('consumes.bottle.destroy');

    Route::get('/consume/package/create', [ConsumerController::class, 'addPackageConsume'])->name('consumes.package.new');
    Route::post('/consume/package/store', [ConsumerController::class, 'storePackageConsume'])->name('consumes.package.store');
    Route::get('/consumes/package/edit', [ConsumerController::class, 'editPackageConsume'])->name('consumes.package.edit');
    Route::patch('/consumes/package/update', [ConsumerController::class, 'updatePackageConsume'])->name('consumes.package.update');
    Route::delete('/consume/package/destroy', [ConsumerController::class, 'destroyPackageConsume'])->name('consumes.package.destroy');

    Route::get('/consume/meat/create', [ConsumerController::class, 'addMeatConsume'])->name('consumes.meat.new');
    Route::post('/consume/meat/store', [ConsumerController::class, 'storeMeatConsume'])->name('consumes.meat.store');
    Route::get('/consumes/meat/edit', [ConsumerController::class, 'editMeatConsume'])->name('consumes.meat.edit');
    Route::patch('/consumes/meat/update', [ConsumerController::class, 'updateMeatConsume'])->name('consumes.meat.update');
    Route::delete('/consume/meat/destroy', [ConsumerController::class, 'destroyMeatConsume'])->name('consumes.meat.destroy');

    Route::get('/goby/private/create', [GoByController::class, 'addPrivateGoBy'])->name('goby.private.new');
    Route::post('/goby/private/store', [GoByController::class, 'storePrivateGoBy'])->name('goby.private.store');
    Route::get('/goby/private/edit', [GoByController::class, 'editPrivateGoBy'])->name('goby.private.edit');
    Route::patch('/goby/private/update', [GoByController::class, 'updatePrivateGoBy'])->name('goby.private.update');
    Route::delete('/goby/private/destroy', [GoByController::class, 'destroyPrivateGoBy'])->name('goby.private.destroy');

    Route::get('/goby/public/create', [GoByController::class, 'addPublicGoBy'])->name('goby.public.new');
    Route::post('/goby/public/store', [GoByController::class, 'storePublicGoBy'])->name('goby.public.store');
    Route::get('/goby/public/edit', [GoByController::class, 'editPublicGoBy'])->name('goby.public.edit');
    Route::patch('/goby/public/update', [GoByController::class, 'updatePrivateGoBy'])->name('goby.public.update');
    Route::delete('/goby/public/destroy', [GoByController::class, 'destroyPublicGoBy'])->name('goby.public.destroy');

    Route::get('/alternative/create', [AlternativeTransportController::class, 'create'])->name('alternative.new');
    Route::post('/alternative/store', [AlternativeTransportController::class, 'store'])->name('alternative.store');
    Route::get('/alternative/edit', [AlternativeTransportController::class, 'edit'])->name('alternative.edit');
    Route::patch('/alternative/update', [AlternativeTransportController::class, 'update'])->name('alternative.update');
    Route::delete('/alternative/destroy', [AlternativeTransportController::class, 'destroy'])->name('alternative.destroy');
});

Route::middleware('role:ADMIN')->group(callback: function () {
    Route::get("/goods", [App\Http\Controllers\GoodController::class, 'index'])->name('goods.index');
    Route::get('/admin/plastic', [\App\Http\Controllers\PlasticController::class, 'index'])->name('plastic.index');
    Route::get('/admin/{good}/edit', [\App\Http\Controllers\GoodController::class, 'edit'])->name('goods.edit');

    Route::get('/goods/new', [App\Http\Controllers\GoodController::class, 'create'])->name('goods.create');
    Route::post('/goods/new', [App\Http\Controllers\GoodController::class, 'store'])->name('goods.store');


    Route::get('/goods/bottle/index', [GoodController::class, 'indexBottle'])->name('goods.bottle.index');
    Route::get('/goods/bottle/new', [GoodController::class, 'createBottle'])->name('goods.bottle.create');
    Route::post('/goods/bottle/new', [GoodController::class, 'storeBottle'])->name('goods.bottle.store');
    Route::get('/goods/bottle/{bottle}/edit', [GoodController::class, 'editBottle'])->name('goods.bottle.edit');
    Route::patch('/goods/bottle/update', [GoodController::class, 'updateBottle'])->name('goods.bottle.update');
    Route::delete('/goods/bottle/bottle/destroy', [GoodController::class, 'destroy'])->name('goods.bottle.destroy');

    Route::get('/goods/packages/', [PackageController::class, 'index'])->name('packages.index');
    Route::get('/goods/packages/create', [PackageController::class, 'create'])->name('packages.create');
    Route::post('/goods/packages/create', [PackageController::class, 'store'])->name('packages.store');
    Route::get('/goods/packages/{package}/edit', [PackageController::class, 'edit'])->name('packages.edit');
    Route::patch('/goods/packages/update', [PackageController::class, 'update'])->name('packages.update');
    Route::delete('/goods/packages/package/destroy', [PackageController::class, 'destroy'])->name('packages.destroy');

    Route::get('/goods/meats', [App\Http\Controllers\MeatController::class, 'index'])->name('meats.index');
    Route::get('/goods/meats/create', [App\Http\Controllers\MeatController::class, 'create'])->name('meats.create');
    Route::post('/goods/meats/create', [App\Http\Controllers\MeatController::class, 'store'])->name('meats.store');
    Route::get('/goods/meats/{meat}/edit', [App\Http\Controllers\MeatController::class, 'edit'])->name('meats.edit');
    Route::patch('/goods/meats/update', [App\Http\Controllers\MeatController::class, 'update'])->name('meats.update');
    Route::delete('/goods/meats/meat/destroy', [MeatController::class, 'destroy'])->name('meats.destroy');


    Route::get('/transport/private', [PrivateTransportController::class, 'index'])->name('transports.private.index');
    Route::get('/transport/private/create', [PrivateTransportController::class, 'create'])->name('transports.private.create');
    Route::post('/transport/private/create', [PrivateTransportController::class, 'store'])->name('transports.private.store');
    Route::get('/transport/private/{transport}/edit', [PrivateTransportController::class, 'edit'])->name('transports.private.edit');
    Route::patch('/transport/private/update', [PrivateTransportController::class, 'update'])->name('transports.private.update');
    Route::delete('/transport/private/destroy', [PrivateTransportController::class, 'destroy'])->name('transports.private.destroy');


    Route::get('/transport/public', [PublicTransportController::class, 'index'])->name('transports.public.index');
    Route::get('/transport/public/create', [PublicTransportController::class, 'create'])->name('transports.public.create');
    Route::post('/transport/public/store', [PublicTransportController::class, 'store'])->name('transports.public.store');
    Route::get('/transport/public/{transport}/edit', [PublicTransportController::class, 'edit'])->name('transports.public.edit');
    Route::patch('/transport/public/update', [PublicTransportController::class, 'update'])->name('transports.public.update');
    Route::delete('/transport/public/destroy', [PublicTransportController::class, 'destroy'])->name('transports.public.destroy');

    Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
});
