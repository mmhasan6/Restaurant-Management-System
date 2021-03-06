<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodChefController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// User Routes 
    Route::get('/', [HomeController::class, 'index']);
  // Foods Routes
  Route::get('foodmenu', [HomeController::class, 'foodmenu']);
  Route::get('chef', [HomeController::class, 'chef']);

// End User Routes 
Route::get('redirects', [HomeController::class, 'redirects']); //for multi Auth


// Start Admin Routes
  // Users functions
    Route::get('users', [AdminController::class, 'user']);
    Route::get('delete_user/{id}', [AdminController::class, 'deleteuser']);

  // Foods Routes
    Route::get('foodmenu', [AdminController::class, 'foodmenu']);
    Route::post('uploadfood', [AdminController::class, 'uploadfood']);
    Route::get('update_food/{id}', [AdminController::class, 'showupdatepage']);
		Route::put('update_food/{id}',[AdminController::class, 'update']);
    Route::get('delete_food/{id}', [AdminController::class, 'destroy']);
  //Reservation
    Route::post('reservation', [AdminController::class, 'reservation']); // Anyone can do a reservation
    Route::get('show_reservation', [AdminController::class, 'show_reservation']);

  //Chef
    Route::get('chef', [FoodChefController::class, 'showchef']);
    Route::post('uploadchef', [FoodChefController::class, 'uploadchef']);
    Route::get('update_chef/{id}', [FoodChefController::class, 'showupdatepage']);
    Route::put('update_chef/{id}',[FoodChefController::class, 'update_chef']);
    Route::get('delete_chef/{id}', [FoodChefController::class, 'destroy']);

// ! End Admin Routes

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');