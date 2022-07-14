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


use Modules\Guest\Http\Controllers\PagesController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', [PagesController::class, 'homePage'])->name('home.page');
        Route::get('/services', [PagesController::class, 'services'])->name('services.page');
        Route::get('/projects', [PagesController::class, 'projects'])->name('projects.page');
        Route::get('/blogs', [PagesController::class, 'blogs'])->name('blogs.page');
        Route::get('/about', [PagesController::class, 'aboutus'])->name('about.page');
        Route::get('/contact', [PagesController::class, 'contact'])->name('contact.page');
        Route::get('/{slug}', [PagesController::class, 'show'])->name('taxonomy.show');
    });
