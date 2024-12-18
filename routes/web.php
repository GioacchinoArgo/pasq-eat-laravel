<?php


use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('register');
});

Route::prefix('/admin')->middleware(['auth'])->name('admin.')->group(function () {
    //Route::get('', DishController::class)->name('home');

    // Rotta per spostare un progetto nel cestino
    Route::get('/dishes/trash', [DishController::class, 'trash'])->name('dishes.trash');
    // Rotta per il restore di un progetto
    Route::patch('/dishes/{dish}/restore', [DishController::class, 'restore'])->name('dishes.restore')->withTrashed();

    // Tutte le rotte dei piatti
    Route::resource('dishes', DishController::class)->withTrashed(['show', 'edit', 'update']);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {

        // Rotte Admin Restaurant CRUD
        Route::get('/restaurants/{restaurant}', [RestaurantController::class, 'show'])->name('restaurants.show');
        Route::put('/restaurants/{restaurant}', [RestaurantController::class, 'update'])->name('restaurants.update');

        // Rotte degli ordini
        Route::get('/orders/graphs', [OrderController::class, 'graphs'])->name('orders.graphs');
        Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    });
});

require __DIR__ . '/auth.php';
