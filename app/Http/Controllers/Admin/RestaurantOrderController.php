<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantOrderController extends Controller
{
    public function orders(Restaurant $restaurant, Order $order)
    {
        //dd($restaurant);
        if ($restaurant->user_id !== Auth::id()) {
            abort(404);
        }
        $restaurant = Restaurant::where('id', $restaurant->id)->first(); // Assicurati che il ristorante esista
        $restaurant_name = $restaurant->restaurant_name;
        $orders = Order::where('restaurant_id', Auth::id())->orderBy('id')->get();

        $total_orders = 0;
        foreach ($orders as $order) {
            $total_orders += $order->total;
        }

        return view('admin.restaurants.orders', compact('orders', 'restaurant_name', 'total_orders'));
    }
}
