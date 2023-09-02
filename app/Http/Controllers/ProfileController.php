<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;


class ProfileController extends Controller
{
    public function edit()
    {
        // Lógica para cargar y prellenar los datos del formulario de edición del perfil
        $user = auth()->user();
        $roles = $user->roles;

        return view('profile.edit', compact('user', 'roles'));

    }

}
