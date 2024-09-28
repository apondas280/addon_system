<?php

use App\Addons\Post\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::controller(PostController::class)->group(function () {
    Route::get('posts', 'index')->name('posts');
});