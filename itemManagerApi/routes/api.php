<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemManagerApi;




// Route::resource('items',ItemManagerApi::class);
Route::apiResource('items',ItemManagerApi::class);
