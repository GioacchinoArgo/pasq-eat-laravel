<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Recuperiamo gli ordini
        $orders = Order::where('restaurant_id', Auth::id())->orderBy('created_at')->get();

        // Recuperiamo le informazioni del ristorante
        $restaurant = Restaurant::whereId(Auth::id())->first();
        $restaurant_name = $restaurant->restaurant_name;

        // Giriamo sugli ordini del ristorante per successivamente calcolare il totale
        $total_orders = 0;
        foreach ($orders as $order) {
            $total_orders += $order->total;
        }

        return view('admin.orders.index', compact('orders', 'restaurant_name', 'total_orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant, Order $order)
    {
    }
}
