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


use Modules\Contact\Http\Controllers\Admin\AdminContactController;

Route::post('/contact', [\Modules\Contact\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::prefix('admin')->middleware(['auth'])->group(function () {
            Route::get('/contacts', [AdminContactController::class, 'index'])->name('admin.contact.index');

            Route::get('/contacts/show/{id}', [AdminContactController::class, 'edit'])->name('admin.contact.show');
            Route::post('/contacts/delete', [AdminContactController::class, 'delete'])->name('admin.contact.delete');

            Route::post('/contact/toggle-status', [AdminContactController::class, 'toggle_status'])->name('admin.contact-toggle-status');

        });
    }
);
