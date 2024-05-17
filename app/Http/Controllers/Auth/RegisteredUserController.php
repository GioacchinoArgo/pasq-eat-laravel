<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // Recupero le categorie da passare al form
        $categories = Category::select('label', 'id')->get();
        $vats = Restaurant::select('vat')->get();
        $emails = User::select('email')->get();

        return view('auth.register', compact('categories', 'vats', 'emails'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {



        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => 'required|string|max:255',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', 'min:8', Rules\Password::defaults()],
            'restaurant_name' => 'required|string|min:5|max:50',
            'address' => 'required|string|min:5|max:50',
            'phone' => 'string|min:10|max:15|nullable',
            'vat' => 'required|unique:restaurants|string|min:13|max:13',
            'categories' => 'required|exists:categories,id',

        ], [
            'name.required' => 'Il campo Nome è obbligatorio',
            'lastname.required' => 'Il campo Cognome è obbligatorio',
            'email.required' => 'Il campo Email è obbligatorio',
            'email.lowercase' => 'Nel campo Email non possono essere inserite lettere maiuscole',
            'email.unique' => 'Email già utilizzata',
            'email.email' => 'L\'email inserita non è valida',
            'password.required' => 'Il campo password è obbligatorio',
            'password.confirmed' => 'Le password non coincidono',
            'password.min' => 'La password deve avere almeno 8 caratteri',
            'restaurant_name.required' => 'Il nome del ristorante è obbligatorio',
            'restaurant_name.min' => 'Il nome non può essere più corto di :min caratteri',
            'restaurant_name.max' => 'Il nome non può essere più corto di :max caratteri',
            'address.required' => 'L\'indirizzo del ristorante è obbligatorio',
            'address.min' => 'L\'indirizzo del ristorante non può contenere meno di :min caratteri',
            'address.max' => 'L\'indirizzo del ristorante non può contenere più di :max caratteri',
            'phone.min' => 'Il numero di telefono non può avere meno di :min cifre',
            'phone.max' => 'Il numero di telefono non può avere più di :max cifre',
            'vat.required' => 'La P.IVA è obbligatoria',
            'vat.unique' => 'P.IVA già usata',
            'vat.min' => 'La P.IVA non può contenere meno di :min cifre',
            'vat.max' => 'La P.IVA non può contenere più di :max cifre',
            'categories.required' => 'Categoria obbligatoria',
            'categories.exists' => 'Categoria non valida',
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $data = $request->all();

        $restaurant = new Restaurant();

        $restaurant->fill($data);

        $restaurant->slug = Str::slug($data['restaurant_name']);

        // Nel Ristorante collego lo user_id
        $restaurant->user_id = Auth::user()->id;

        $restaurant->save();

        if (Arr::exists($data, 'categories')) $restaurant->categories()->attach($data['categories']);

        return redirect(RouteServiceProvider::HOME);
    }
}
