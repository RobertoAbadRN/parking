<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiclesController extends Controller
{
    public function index()
    {
        $query = "SELECT p.name AS property_name, COUNT(v.property_code) AS vehicle_count
              FROM properties AS p
              LEFT JOIN vehicles AS v ON p.property_code = v.property_code
              GROUP BY p.property_code";

        $vehicles = DB::select($query);

        return view('vehicles.index', compact('vehicles'));
    }
    public function registerVehicle(Request $request)
    {
        // Obtener los datos del formulario
        // Obtener el valor de property_code de la URL
        $property_code = $request->input('property_code');
        $resident_name = $request->input('resident_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $apart_unit = $request->input('apart_unit');
        $preferred_language = $request->input('preferred_language');
        $license_plate = $request->input('license_plate');
        $vin = $request->input('vin');
        $make = $request->input('make');
        $model = $request->input('model');
        $year = $request->input('year');
        $color = $request->input('color');
        $vehicle_type = $request->input('vehicle_type');

        // Guardar los datos en la base de datos
        $vehicle = new Vehicle();
        $vehicle->property_code = $property_code;
        $vehicle->resident_name = $resident_name;
        $vehicle->email = $email;
        $vehicle->phone = $phone;
        $vehicle->apart_unit = $apart_unit;
        $vehicle->preferred_language = $preferred_language;
        $vehicle->license_plate = $license_plate;
        $vehicle->vin = $vin;
        $vehicle->make = $make;
        $vehicle->model = $model;
        $vehicle->year = $year;
        $vehicle->color = $color;
        $vehicle->vehicle_type = $vehicle_type;
        // Asignar cualquier otra propiedad necesaria en tu modelo "Vehicle"

        $vehicle->save();

        // Realizar cualquier otra acción necesaria, como redireccionar a una página de confirmación
        return redirect()->route('login')->with('success', 'Visitor pass registered successfully.');

    }

}
