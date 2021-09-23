<?php

use App\Http\Controllers\Backend\BackendController;

Route::get('/', [BackendController::class, 'index'])->name('index');