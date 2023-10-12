<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
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
    
        // Attempt to authenticate by email or username
        $user = User::where(function ($query) use ($validated) {
            $query->where('email', $validated['login'])
                ->orWhere('user', $validated['login']);
        })->first();
    
        if ($user && \Auth::attempt(['email' => $user->email, 'password' => $validated['password']])) {
            // User authenticated successfully
            $user->update(['last_login' => now()]);
        
            if ($user->hasRole('Parking inspector')) {
                // If the user has the role "Parking inspector," redirect directly to the "inspector" route
                return redirect()->route('inspector'); // Make sure the route is correctly defined
            } elseif ($user->hasRole('Resident')) {
                // If the user has the role "Resident," redirect to the "recidents" route
                return redirect()->route('recidents'); // Make sure the route is correctly defined
            } else {
                // If the user has other roles, redirect to the "index" route or any other desired route
                return redirect()->route('index'); // Make sure the route is correctly defined
            }
        }
    
        $validator->errors()->add(
            'login', 'Incorrect username or password'
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
           // dd( $property);
            
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
