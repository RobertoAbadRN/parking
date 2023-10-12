<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SearchController extends Controller
{

    public function index()
    {
        // Verifica si el usuario está autenticado
        if (auth()->check()) {
            // Verifica si el usuario tiene el rol "Parking inspector"
            if (auth()->user()->hasRole('Parking inspector')) {
                // Si tiene el rol "Parking inspector", obtén todas las propiedades y muestra la vista
                $properties = Property::all();
                return view('search.inspector', compact('properties'));
            } else {
                // Si no tiene el rol "Parking inspector", puedes redirigirlo a otra vista o mostrar un mensaje de error
                return view('no-access'); // Por ejemplo, una vista que indique que no tiene acceso
            }
        } else {
            // Si el usuario no está autenticado, redirige a la página de inicio de sesión
            return redirect()->route('login');
        }
    }

    public function search(Request $request)
    {
        $propertyId = $request->input('property_id');
    
        $property = DB::table('properties')
            ->where('id', $propertyId)
            ->first();
    
        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }
    
        // Obtén la información de los pases de visitantes
        $results = DB::table('properties')
            ->join('visitorpasses', 'properties.property_code', '=', 'visitorpasses.property_code')
            ->where('properties.id', $propertyId)
            ->select(
                'visitorpasses.license_plate',
                'visitorpasses.vehicle_type',
                'visitorpasses.color',
                'visitorpasses.year',
                'visitorpasses.vp_code',
                'visitorpasses.created_at',
                'visitorpasses.valid_from',
                'visitorpasses.visitor_name',
                'visitorpasses.visitor_phone'
            )
            ->distinct()
            ->get();
    
        // Obtén la información de los vehículos
        $vehicles = DB::table('properties')
            ->join('vehicles', 'properties.property_code', '=', 'vehicles.property_code')
            ->where('properties.id', $propertyId)
            ->select(
                'vehicles.license_plate AS vehicle_license_plate',
                'vehicles.vin',
                'vehicles.make',
                'vehicles.model',
                'vehicles.year AS vehicle_year',
                'vehicles.color AS vehicle_color',
                'vehicles.vehicle_type AS vehicle_vehicle_type',
                'vehicles.permit_type',
                'vehicles.permit_status',
                'vehicles.start_date'
            )
            ->distinct()
            ->get();
    
        if ( $results->isEmpty() && $vehicles->isEmpty()) {
            return response()->json(['message' => 'No data found']);
        }
    
        return response()->json(['results' => $results, 'vehicles' => $vehicles]);
    }
    
    
    public function validatePropertyCode(Request $request)
    {

        $input = $request->input('property_code');

        $property = Property::where('property_code', $input)

            ->orWhere('address', $input)

            ->first();

        if ($property) {

            return redirect()->route('visitors.addvisitors', ['property_code' => $property->property_code]);

        } else {

            return redirect()->route('login')->withInput()->with('error', 'Property not found!');

        }

    }

}
