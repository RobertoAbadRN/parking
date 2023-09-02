<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    
            return redirect()->route('index');
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
            return view('register', compact('user', 'propertyCode'));
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
