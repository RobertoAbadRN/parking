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

    public function permit($property)
    {
        return view('settingss/permit', ['property' => Property::find($property)]);
    }

    public function permit_type($property)
    {
        return view('settingss/permit_type', ['property' => Property::find($property)] );
    }

    public function visitor($property)
    {
        return view('settingss/visitor', ['property' => Property::find($property)] );
    }

    public function registration($property)
    {
        return view('settingss/registration', ['property' => Property::find($property)] );
    }
}
