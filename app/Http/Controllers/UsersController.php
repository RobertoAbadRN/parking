<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $users = User::all(); 
        
            return view('users.index', ['users' => $users]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.adduser');   
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
            'access_level' => 'required',
            'property' => 'required',
        ]);

        // Crear un nuevo usuario con los datos del formulario
        $user = new User();
        $user->username = $validatedData['user'];
        $user->name = $validatedData['name'];
        $user->phone = $validatedData['phone'];
        $user->email = $validatedData['email'];
        $user->access_level = $validatedData['access_level'];
        $user->property = $validatedData['property'];

        // Guardar el nuevo usuario en la base de datos
        $user->save();

        // Redireccionar a la página deseada después de guardar los datos
        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente');
    
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

        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User not found.');
        }

        return view('users.edituser', compact('user'));
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
            return redirect()->route('user.index')->with('error', 'User not found.');
        }

        $validated = $request->validate([
            'username' => 'required|max:255',
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email',
            'access_level' => 'required',
            'property' => 'required',
        ]);

        $user->username = $validated['username'];
        $user->name = $validated['name'];
        $user->phone = $validated['phone'];
        $user->email = $validated['email'];
        $user->access_level = $validated['access_level'];
        $user->property = $validated['property'];

        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
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
