<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    if (file_exists(__DIR__ . '/../../routes/web.php')) {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
    }
});