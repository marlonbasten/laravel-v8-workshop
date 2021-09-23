<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\PostController;

Route::get('/', [BackendController::class, 'index'])->name('index');

Route::prefix('post')->name('post.')->group(function () {

    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('create', [PostController::class, 'create'])->name('create');
    Route::post('store', [PostController::class, 'store'])->name('store');

    Route::prefix('{post}')->middleware(['permission:admin'])->group(function () {
        Route::get('/', [PostController::class, 'detail'])->name('detail');
        Route::get('delete', [PostController::class, 'destroy'])->name('delete');
        Route::get('edit', [PostController::class, 'edit'])->name('edit');
        Route::post('update', [PostController::class, 'update'])->name('update');
    });

});