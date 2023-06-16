<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
    public function create($property_code)
    {
        $property = Property::where('property_code', $property_code)->first();
        $properties = Property::pluck('address', 'property_code');

        return view('vehicles.addvehicle', compact('property', 'properties'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'resident_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'apart_unit' => 'required',
            'preferred_language' => 'required',
            'license_plate' => 'required',
            'vin' => 'required',
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'vehicle_type' => 'required',
            'property_code' => 'required',
            'permit_status' => 'required',
            'permit_type' => 'required',
            'reserved_space' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        // Verificar si la validación falla
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Acceder a los valores validados
        $residentName = $request->input('resident_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $apartUnit = $request->input('apart_unit');
        $preferredLanguage = $request->input('preferred_language');
        $licensePlate = $request->input('license_plate');
        $vin = $request->input('vin');
        $make = $request->input('make');
        $model = $request->input('model');
        $year = $request->input('year');
        $color = $request->input('color');
        $vehicleType = $request->input('vehicle_type');
        $propertyCode = $request->input('property_code');
        $permitStatus = $request->input('permit_status');
        $permitType = $request->input('permit_type');
        $reservedSpace = $request->input('reserved_space');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Crear una nueva instancia del modelo Vehicle
        $vehicle = new Vehicle();
// Asignar los valores de los campos al modelo
        $vehicle->resident_name = $request->input('resident_name');
        $vehicle->email = $request->input('email');
        $vehicle->phone = $request->input('phone');
        $vehicle->apart_unit = $request->input('apart_unit');
        $vehicle->preferred_language = $request->input('preferred_language');
        $vehicle->license_plate = $request->input('license_plate');
        $vehicle->vin = $request->input('vin');
        $vehicle->make = $request->input('make');
        $vehicle->model = $request->input('model');
        $vehicle->year = $request->input('year');
        $vehicle->color = $request->input('color');
        $vehicle->vehicle_type = $request->input('vehicle_type');
        $vehicle->property_code = $request->input('property_code');
        $vehicle->permit_status = $request->input('permit_status');
        $vehicle->permit_type = $request->input('permit_type');
        $vehicle->reserved_space = $request->input('reserved_space');
        $vehicle->start_date = $request->input('start_date');
        $vehicle->end_date = $request->input('end_date');

// Guardar el modelo en la base de datos
        $vehicle->save();

        // Verificar qué botón se presionó
        if ($request->has('savePrintButton')) {
            // Generar el documento y realizar la acción deseada, como imprimirlo o mostrar una vista previa
            $this->generateAndPrintDocument($vehicle);

            // Redirigir a una página de éxito o mostrar un mensaje de éxito después de imprimir el documento
            return redirect()->route('vehicles.index')->with('success', 'Vehicle saved and printed successfully.');
        }
        // Redireccionar a una página de éxito o mostrar un mensaje de éxito
        return redirect()->route('properties.vehicles', ['property_code' => $request->property_code])->with('success', 'Vehicle saved successfully');
    }
    // Función para generar el documento y realizar la acción de impresión o salida
    private function generateAndPrintDocument($vehicle)
    {
        // Lógica para generar el documento y realizar la acción deseada
        // Puedes utilizar una librería o una API de impresión para generar el documento y enviarlo a la impresora
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
