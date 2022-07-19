<?php


use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\Admin\AdminUserController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::prefix('admin')->middleware(['auth'])->group(function () {

            //category routes
            Route::get('/users', [AdminUserController::class,'index'])->name('users.index');
            Route::get('/users/create', [AdminUserController::class,'create'])->name('users.create');
            Route::post('/users/store', [AdminUserController::class,'store'])->name('users.store');
            Route::get('/users/edit/{users}', [AdminUserController::class,'edit'])->name('users.edit');
            Route::post('/users/update', [AdminUserController::class, 'update'])->name('users.update');
            Route::post('/users/delete/{users}', [AdminUserController::class, 'destroy'])->name('users.delete');
            Route::post('/user/toggle-status', [AdminUserController::class, 'toggle_status'])->name('admin.user-toggle-status');


        });
    }
);
