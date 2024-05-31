<?php

use App\Http\Controllers\FacilityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/facilities', [FacilityController::class, 'index']);
Route::get('/fetch-facilities', [FacilityController::class, 'fetchFacilities']);
