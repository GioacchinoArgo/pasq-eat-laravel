<?php

use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\DishController as ApiDishController;
use App\Http\Controllers\Api\Orders\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Rotta per recuperante il ristorante dall'id
Route::get('/restaurants/restaurant/{id}', [RestaurantController::class, 'getRestaurant']);
//Rotta per il singolo ristorante
Route::get('/restaurants/{slug}', [RestaurantController::class, 'show']);
//Rotta per tutti i ristoranti
Route::get('/restaurants', [RestaurantController::class, 'index']);

//Rotta per il piatto
Route::get('/restaurants/{restaurantSlug}/dishes/{dishSlug}', [RestaurantController::class, 'showDish']);


//creo la rotta al DishControllergenerate
Route::get('dishes', [ApiDishController::class, 'index']);

//Rotte della Orders API
// generazione del token
Route::get('orders/generate', [OrderController::class, 'generate']);
// esito transazione
Route::post('orders/make/payment', [OrderController::class, 'makePayment']);
