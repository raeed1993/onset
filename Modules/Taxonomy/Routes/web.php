<?php

use Illuminate\Support\Facades\Route;
use Modules\Taxonomy\Http\Controllers\Blog\BlogController;
use Modules\Taxonomy\Http\Controllers\Client\ClientController;
use Modules\Taxonomy\Http\Controllers\ClientBig\ClientBigController;
use Modules\Taxonomy\Http\Controllers\Meta\MetaController;
use Modules\Taxonomy\Http\Controllers\Portfolio\ProjectController;
use Modules\Taxonomy\Http\Controllers\Service\ServiceController;
use Modules\Taxonomy\Http\Controllers\Slider\SliderController;
use Modules\Taxonomy\Http\Controllers\Website\PagesController;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::prefix('admin')->middleware(['auth'])->group(function () {

//            Route::post('/taxonomy/toggle-status/', [AppTaxonomyController::class, 'toggleStatus'])->name('toggle-status');

            Route::get('/sliders', [SliderController::class, 'index'])->name('admin.slider.index');
            Route::post('/sliders', [SliderController::class, 'update'])->name('admin.slider.store');


            Route::get('/blogs', [BlogController::class, 'index'])->name('admin.blog.index');
            Route::get('/blogs/create', [BlogController::class, 'create'])->name('admin.blog.create');
            Route::get('/blogs/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
            Route::post('/blogs/update', [BlogController::class, 'update'])->name('admin.blog.update');
            Route::post('/blogs', [BlogController::class, 'store'])->name('admin.blog.store');
            Route::post('/blogs/delete', [BlogController::class, 'delete'])->name('admin.blog.delete');

            Route::get('/services', [ServiceController::class, 'index'])->name('admin.service.index');
            Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.service.create');
            Route::get('/services/edit/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
            Route::post('/services/update', [ServiceController::class, 'update'])->name('admin.service.update');
            Route::post('/services', [ServiceController::class, 'store'])->name('admin.service.store');
            Route::post('/services/delete', [ServiceController::class, 'delete'])->name('admin.service.delete');

            Route::get('/projects', [ProjectController::class, 'index'])->name('admin.project.index');
            Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.project.create');
            Route::get('/projects/edit/{id}', [ProjectController::class, 'edit'])->name('admin.project.edit');
            Route::post('/projects/update', [ProjectController::class, 'update'])->name('admin.project.update');
            Route::post('/projects', [ProjectController::class, 'store'])->name('admin.project.store');
            Route::post('/projects/delete', [ProjectController::class, 'delete'])->name('admin.project.delete');

            Route::get('/clients', [ClientController::class, 'index'])->name('admin.client.index');
            Route::get('/clients/create', [ClientController::class, 'create'])->name('admin.client.create');
            Route::get('/clients/edit/{id}', [ClientController::class, 'edit'])->name('admin.client.edit');
            Route::post('/clients/update', [ClientController::class, 'update'])->name('admin.client.update');
            Route::post('/clients', [ClientController::class, 'store'])->name('admin.client.store');
            Route::post('/clients/delete', [ClientController::class, 'delete'])->name('admin.client.delete');

            Route::get('/clients-big', [ClientBigController::class, 'index'])->name('admin.client-big.index');
            Route::get('/clients-big/create', [ClientBigController::class, 'create'])->name('admin.client-big.create');
            Route::get('/clients-big/edit/{id}', [ClientBigController::class, 'edit'])->name('admin.client-big.edit');
            Route::post('/clients-big/update', [ClientBigController::class, 'update'])->name('admin.client-big.update');
            Route::post('/clients-big', [ClientBigController::class, 'store'])->name('admin.client-big.store');
            Route::post('/clients-big/delete', [ClientBigController::class, 'delete'])->name('admin.client-big.delete');

            Route::get('/meta', [MetaController::class, 'index'])->name('admin.meta.index');
            Route::get('/meta/edit/{id}', [MetaController::class, 'edit'])->name('admin.meta.edit');

            Route::get('/website/pages', [PagesController::class, 'edit'])->name('admin.website.edit');
            Route::get('/website/links', [PagesController::class, 'edit_links'])->name('admin.website.links-edit');
            Route::post('/website/pages/update', [PagesController::class, 'update'])->name('admin.website.update');
            Route::post('/website/links/update', [PagesController::class, 'updateSocial'])->name('admin.website.links-update');



            Route::post('/taxonomy/toggle-status', [\Modules\Taxonomy\Http\Controllers\TaxonomyController::class, 'toggle_status'])->name('admin.taxonomy-toggle-status');


        });
    }
);
