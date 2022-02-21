<?php

use Illuminate\Support\Facades\Route;

Route::get('middleware-route', fn () => 'middleware response')->middleware('test-middleware');

Route::middleware('group1')->group(function () {
    Route::get('group1-route', fn () => 'group1 response');
});
