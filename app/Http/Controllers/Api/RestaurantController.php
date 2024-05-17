<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoryLabels = $request->query('categories');
        //Recupero tutte le categorie
        $categories = Category::all();
        //Se arrivano dati nella query
        if (!empty($categoryLabels)) {
            //Trasformo l'array in stringa e aggiungo un separatore
            $categoryLabels = explode(',', $categoryLabels);
            // Prendo tutti i ristoranti
            $query = Restaurant::query();
            // Applica un filtro per ogni categoria richiesta
            foreach ($categoryLabels as $label) {
                /*Cerco nella tabella categories le categorie la cui colonna
                label corrisponde al valore $label*/
                $query->whereHas('categories', function ($query) use ($label) {
                    $query->where('label', $label);
                });
            }
            /*Recupero i ristoranti sottoposti 
            alla query con le categorie*/
            $restaurants = $query->with('categories')->get();
        } else {
            //Recupero i ristoranti con le categorie e lo user
            $restaurants = Restaurant::orderBy('id')->orderByDesc('created_at')->with('categories', 'user')->get();
        }

        //Restituisco un array di array associativi 
        return response()->json(['restaurants' => $restaurants, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {


        // Recupero il ristorante con il dato slug 
        $restaurant = Restaurant::with('categories')
            ->whereSlug($slug)
            ->first();

        // Recupero il ristorante con il dato slug e carica solo i piatti con disponibilità 1
        $restaurant_dishes = Restaurant::whereSlug($slug)
            ->with(['dishes' => function ($query) {
                $query->where('availability', 1)
                    ->orderBy('name', 'asc');
            }])
            ->first();

        // Verifica se il ristorante esiste
        if (!$restaurant) {
            return response()->json(['error' => 'Restaurant not found'], 404);
        }

        // Restituisci i piatti disponibili come risposta JSON
        return response()->json(['restaurant' => $restaurant, 'restaurant_dishes' => $restaurant_dishes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function showDish(string $restaurantSlug, string $dishSlug)
    {
        $restaurant = Restaurant::whereSlug($restaurantSlug)->first();

        if (!$restaurant) {
            return response()->json(['message' => 'Ristorante non trovato'], 404);
        }

        $dish = $restaurant->dishes()->where('slug', $dishSlug)->first();

        if (!$dish) {
            return response()->json(['message' => 'Piatto non trovato'], 404);
        }

        return response()->json($dish);
    }

    public function getRestaurant(string $id)
    {
        $restaurant = Restaurant::whereId($id)->first();
        return response()->json($restaurant);
    }
}
