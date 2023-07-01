<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\NewUserNotification;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::join('properties', 'users.property_code', '=', 'properties.property_code')
            ->select('users.*', 'properties.name')
            ->get();

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $properties = Property::all();

        return view('users.adduser', compact('properties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $request)
{
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'user' => 'required',
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'access_level' => 'required',
        'property_code' => 'required',
    ]);
    //dd($validatedData);

    // Obtener el correo electrónico y el usuario del formulario
$correo = $validatedData['email'];
$user = $validatedData['user'];

    // Generar la contraseña sin encriptar
    $plainPassword = $validatedData['password'];

    // Enviar el correo al usuario
    Mail::to($correo)->send(new NewUserNotification(User::make($validatedData), $plainPassword));

    // Encriptar la contraseña antes de asignarla al campo 'password' del modelo User
    $validatedData['password'] = bcrypt($validatedData['password']);

    // Crear el usuario en la base de datos
       // Crear el usuario en la base de datos y asignar el valor de 'banned' directamente
       $user = User::create([
        'user' => $validatedData['user'],
        'name' => $validatedData['name'],
        'phone' => $validatedData['phone'],
        'email' => $validatedData['email'],
        'password' => $validatedData['password'],
        'access_level' => $validatedData['access_level'],
        'property_code' => $validatedData['property_code'],
        'banned' => 'no',
    ]);

    // Redireccionar a una página de éxito o mostrar un mensaje de éxito
    return redirect()->route('users')->with('success', 'User created successfully!');
}


    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $addresses = Property::pluck('address');

        if (!$user) {
            return redirect()->route('users')->with('error', 'User not found.');
        }

        return view('users.edituser', compact('user', 'addresses'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users')->with('error', 'User not found.');
        }

        $validated = $request->validate([
            'user' => 'required|max:255',
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email',
            'access_level' => 'required',
            'property' => 'required',
        ]);

        $user->user = $validated['user'];
        $user->name = $validated['name'];
        $user->phone = $validated['phone'];
        $user->email = $validated['email'];
        $user->access_level = $validated['access_level'];
        $user->property = $validated['property'];

        $user->save();

        return redirect()->route('users')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
