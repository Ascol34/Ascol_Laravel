<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Embed\LocationController;


Route::get('/',[LocationController::class,'location_list']);

Route::post('/store-location',[LocationController::class,'store_location']);