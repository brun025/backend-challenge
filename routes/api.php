<?php

use App\Http\Controllers\Api\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['message' => 'success']);
});

Route::apiResource('/items', ItemController::class);


