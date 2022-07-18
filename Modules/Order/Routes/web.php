<?php

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


use Modules\Order\Http\Controllers\Admin\AdminOrderController;

Route::post('/orders', [\Modules\Order\Http\Controllers\OrderController::class, 'store'])->name('order.store');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::prefix('admin')->middleware(['auth'])->group(function () {
            Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.order.index');

            Route::get('/orders/show/{id}', [AdminOrderController::class, 'show'])->name('admin.order.show');
            Route::post('/orders/delete', [AdminOrderController::class, 'delete'])->name('admin.order.delete');


        });
    }
);

