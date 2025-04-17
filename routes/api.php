<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeverageController;

Route::get('/beverages', [BeverageController::class, 'index']);
Route::get('/beverages/{id}', [BeverageController::class, 'show']);
Route::get('/beverages/origin/{origin}', [BeverageController::class, 'byOrigin']);
Route::get('/beverages/type/{type}', [BeverageController::class, 'byType']);
Route::get('/beverages/ingredient/{ingredient}', [BeverageController::class, 'byIngredient']);
Route::get('/beverages/count/origin', [BeverageController::class, 'countByOrigin']);
Route::get('/beverages/calories', [BeverageController::class, 'orderByCalories']);
