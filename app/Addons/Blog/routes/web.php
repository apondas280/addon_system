<?php

use App\Addons\Blog\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::controller(BlogController::class)->group(function () {
    Route::get('blogs', 'index')->name('posts');
});