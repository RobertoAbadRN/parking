<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('login');
    }
    public function loginView2()
    {
        return view('login2');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => ['required'],
            'password' => ['required'],
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $validated = $validator->validated();
    
        // Intentar autenticar por correo electrónico o nombre de usuario
        $user = User::where(function ($query) use ($validated) {
            $query->where('email', $validated['login'])
                ->orWhere('user', $validated['login']);
        })->first();
    
        if ($user && \Auth::attempt(['email' => $user->email, 'password' => $validated['password']])) {
            // Usuario autenticado correctamente
            $user->update(['last_login' => now()]);
        
            if ($user->hasRole('Resident')) {
                // Si el usuario tiene el rol "Resident", redirige a la ruta de "recidents"
                return redirect()->route('recidents'); // Asegúrate de que la ruta sea correcta
            } else {
                // Si el usuario tiene otros roles, redirige a la ruta "index" o cualquier otra que desees
                return redirect()->route('index'); // Asegúrate de que la ruta sea correcta
            }
        }        
    
        $validator->errors()->add(
            'login', 'Usuario o contraseña incorrectos'
        );
        return redirect()->back()->withErrors($validator)->withInput();
    }
    

    public function registerView()
    {
        $user_id = request('user_id');
        $user = User::find($user_id);
    
        if ($user && $user->hasRole('Resident')) {
            $propertyCode = $user->property_code;
            
            // Realiza una consulta para obtener la propiedad por su property_code
            $property = Property::where('property_code', $propertyCode)->first();
            
            if ($property) {
                $propertyName = $property->name;
                $propertyAddress = $property->address;
                return view('register', compact('user', 'propertyCode', 'propertyName','propertyAddress'));
            } else {
                return redirect()->route('errorregister')->with('error', 'Property not found.');
            }
        } else {
            return redirect()->route('errorregister')->with('error', 'User not found or does not have access.');
        }
    }
    

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', "confirmed", Password::min(7)],
        ]);

        $validated = $validator->validated();

        $user = User::create([
            'name' => $validated["name"],
            "email" => $validated["email"],
            "password" => Hash::make($validated["password"]),
        ]);

        auth()->login($user);

        return redirect()->route('index');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
