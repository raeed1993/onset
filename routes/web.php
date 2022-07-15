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

//Route::get('/contact-us', function () {
//
//    return view('pages.services');
//});

Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::middleware(['auth'])->group(function () {

            Route::get('admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
            Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

        });
    }
);
