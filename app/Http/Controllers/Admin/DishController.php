<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;
use Illuminate\Support\Str;

use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // Prendo i piatti del ristorante dell'utente autenticato
        $query = Dish::whereRestaurantId(Auth::id());

        // Filtro per disponibilità
        $availability = $request->query('availability');
        if ($availability) {
            if ($availability === 'available') {
                $query->where('availability', true);
            } elseif ($availability === 'not-available') {
                $query->where('availability', false);
            }
        }

        // Filtro per tipo di portata
        if ($request->filled('course')) {
            $query->where('course', $request->course);
        }


        // Esecuzione della query con filtro 
        $dishes = $query->get();

        // Prendo tutte le portate
        $courses = Dish::select('course')->distinct()->pluck('course');

        // Controllo se l'utente ha un ristorante associato, altrimenti reindirizzo
        if (!Auth::user()->restaurant) {
            return to_route('admin.restaurants.create');
        }

        return view('admin.dishes.index', compact('dishes', 'courses', 'availability'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Dish $dish)
    {
        $diet_options = ['Vegetariano', 'Vegano', 'Gluten-free', 'Carne', 'Pesce'];
        $course_options = ['Antipasto', 'Primo', 'Secondo', 'Dessert'];
        return view('admin.dishes.create', compact('dish', 'diet_options', 'course_options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        // imposto il valore di availability dal form, se ricevo un valore è true, altrimenti false
        $availability = $request->input('availability') ? true : false;

        $data = $request->validated();

        $new_dish = new Dish();

        $new_dish->fill($data);

        $new_dish->slug = Str::slug($new_dish->name);

        $new_dish->availability = $availability;

        $new_dish->restaurant_id = Auth::user()->restaurant->id;


        $new_dish->save();

        // Salvataggio dell'immagine nel database
        if (Arr::exists($data, 'image')) {

            $extension = $data['image']->extension();

            $img_url = Storage::putFileAs('public/dish_images', $data['image'], "{$new_dish->slug}-{$new_dish->id}.{$extension}");

            $new_dish->image = $img_url;
        }

        $new_dish->save();

        return redirect()->route('admin.dishes.show', $new_dish->id)
            //Alert creazione piatto
            ->with('message', "Piatto {$new_dish->name} creato con successo")
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        if ($dish->restaurant->user_id !== Auth::id()) {
            abort(404);
        };

        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        if ($dish->restaurant->user_id !== Auth::id()) {
            abort(404);
        };

        $diet_options = ['Vegetariano', 'Vegano', 'Gluten-free', 'Carne', 'Pesce'];
        $course_options = ['Antipasto', 'Primo', 'Secondo', 'Dessert'];

        return view('admin.dishes.edit', compact('dish', 'diet_options', 'course_options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {

        // imposto il valore di availability dal form, se ricevo un valore è true, altrimenti false
        $availability = $request->input('availability') ? true : false;

        $data = $request->validated();

        // Salvataggio dell'immagine nel database
        if (Arr::exists($data, 'image')) {

            if ($dish->image) Storage::delete($dish->image);

            $extension = $data['image']->extension();

            $img_url = Storage::putFileAs('dish_images', $data['image'], "{$dish->slug}-{$dish->id}.{$extension}");
            $dish->image = $img_url;
        }

        $dish->slug = Str::slug($dish->name);

        $dish->fill($data);

        $dish->availability = $availability;

        $dish->update();

        return redirect()->route('admin.dishes.show', $dish)
            //Alert modifica piatto
            ->with('message', "Piatto {$dish->name} modificato con successo")
            ->with('type', 'warning');
    }

    /**
     * Remove the specified resource from storage.
     */
    //# Action per eliminare il piatto
    public function destroy(Dish $dish)
    {
        if ($dish->restaurant->user_id !== Auth::id()) {
            abort(404);
        };

        $dish->delete();
        //Flash data toast

        return to_route('admin.dishes.index')
            ->with('toast-button-type', 'danger')
            ->with('toast-message', 'Piatto eliminato')
            ->with('toast-label', config('app.name'))
            ->with('toast-method', 'PATCH')
            ->with('toast-route', route('admin.dishes.restore', $dish->id))
            ->with('toast-button-label', 'Annulla');
    }

    //# Action per eliminare il piatto
    public function trash()
    {

        $dishes = Dish::onlyTrashed()->get();

        return view('admin.dishes.trash', compact('dishes'));
    }

    //# Action per ripristianre il piatto
    public function restore(Dish $dish)
    {
        $dish->restore();

        return to_route('admin.dishes.index', $dish->id)
            ->with('type', 'success')
            ->with('message', "Piatto {$dish->name} ripristinato con successo");
    }
}
