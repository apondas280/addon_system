<?php

use Illuminate\Support\Facades\Route;

Route::get('posts', function () {
    return 'Hello from post addon';
});