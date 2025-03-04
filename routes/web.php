<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Embed\LocationController;


Route::get('/',[LocationController::class,'location_list']);
Route::get('/edit-location/{id}', [LocationController::class, 'edit_location']);
Route::post('/store-location',[LocationController::class,'store_location']);
Route::post('/update-location/{id}', [LocationController::class, 'update_location']);
Route::delete('/delete-location/{id}', [LocationController::class, 'delete_location']); 