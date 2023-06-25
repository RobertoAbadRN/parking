<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class SettingsController extends Controller
{
    public function index()
    {
        $properties = Property::all(); // Obtener todos los registros de la tabla "properties"
        
        foreach ($properties as $property) {
            $address = $property->address; // Acceder al campo "address" de cada registro
            // Hacer lo que necesites con la dirección
            // ...
        }
        return view('settingss/index', ['properties' => $properties] );   
    }
}
