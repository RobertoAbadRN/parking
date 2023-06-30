<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\VisitorPass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorsController extends Controller
{

    public function index(Request $request)
    {
        $property_code = $request->query('property_code');

        $property = Property::where('property_code', $property_code)->first();

        if (!$property) {
            abort(404); // Si no se encuentra la propiedad, puedes mostrar una página de error 404
        }

        $address = $property->address;

        return view('visitors/addvisitors', compact('property_code', 'address'));
    }

    public function show()
    {
        $visitorPasses = VisitorPass::join('properties', 'visitorpasses.property_code', '=', 'properties.property_code')
            ->select('properties.property_code', 'properties.name')
            ->distinct()
            ->get();

        $expiredCount = VisitorPass::where('status', 'expired')->count();
        $activeCount = VisitorPass::where('status', 'active')->count();
        $invalidCount = VisitorPass::where('status', 'invalid')->count();

        // Obtener el property_code
        $propertyCode = request()->get('property_code');

        return view('visitors/index', compact('visitorPasses', 'expiredCount', 'activeCount', 'invalidCount'))
            ->with('property_code', $propertyCode);
    }

    public function registerVisitorPass(Request $request)
    {
        // Obtener el valor de property_code del formulario
        $property_code = $request->input('property_code');
        // Obtener los datos del formulario
        $visitor_name = $request->input('visitor_name');
        $visitor_phone = $request->input('visitor_phone');
        $license_plate = $request->input('license_plate');
        $year = $request->input('year');
        $make = $request->input('make');
        $color = $request->input('color');
        $model = $request->input('model');
        $vehicle_type = $request->input('vehicle_type');
        $resident_name = $request->input('resident_name');
        $unit_number = $request->input('unit_number');
        $resident_phone = $request->input('resident_phone');
        $valid_from = $request->input('valid_from');

        // Guardar los datos en la base de datos
        $visitorPass = new VisitorPass();
        $visitorPass->property_code = $property_code;
        $visitorPass->visitor_name = $visitor_name;
        $visitorPass->visitor_phone = $visitor_phone;
        $visitorPass->license_plate = $license_plate;
        $visitorPass->year = $year;
        $visitorPass->make = $make;
        $visitorPass->color = $color;
        $visitorPass->model = $model;
        $visitorPass->vehicle_type = $vehicle_type;
        $visitorPass->resident_name = $resident_name;
        $visitorPass->unit_number = $unit_number;
        $visitorPass->resident_phone = $resident_phone;
        $visitorPass->valid_from = $valid_from;
        $visitorPass->status = 'pending';
        $visitorPass->save();

        // Realizar cualquier otra acción necesaria, como redireccionar a una página de confirmación
        // ...

        return redirect()->route('login')->with('success', 'Visitor pass registered successfully.');

    }

    public function listVisitors($property_code)
    {
        $property = Property::where('property_code', $property_code)->first();

        $visitors = VisitorPass::join('properties', 'visitorpasses.property_code', '=', 'properties.property_code')
            ->where('visitorpasses.property_code', $property_code)
            ->select('visitorpasses.valid_from', 'visitorpasses.license_plate', 'visitorpasses.make', 'visitorpasses.model', 'visitorpasses.color', 'visitorpasses.year', 'visitorpasses.unit_number', 'visitorpasses.status', 'visitorpasses.visitor_name', 'visitorpasses.resident_phone', 'visitorpasses.vehicle_type', 'visitorpasses.resident_name')
            ->get();

        return view('visitors.listvisitors', compact('property', 'visitors'));
    }

    public function addTemporary(Request $request)
    {
        $property_code = $request->route('property_code');

        $visitorPasses = DB::table('visitorpasses')
            ->join('properties', 'visitorpasses.property_code', '=', 'properties.property_code')
            ->where('visitorpasses.property_code', $property_code)
            ->select('visitorpasses.*', 'properties.address')
            ->get();

        //dd($visitorPasses); // Imprimir los datos en la consola para verificar

        return view('visitors/addtemporary', compact('property_code', 'visitorPasses'));
    }
    public function storeTemporary(Request $request)
    {
        $property_code = $request->input('property_code');

        // Validar los datos del formulario si es necesario
        $validatedData = $request->validate([
            'visitor_name' => 'required',
            'visitor_phone' => 'required',
            'license_plate' => 'required',
            'year' => 'required',
            'make' => 'required',
            'model' => 'required',
            'color' => 'required',
            'vehicle_type' => 'required',
            'resident_name' => 'required',
            'unit_number' => 'required',
            'resident_phone' => 'required',
            'valid_from_date' => 'required|date',
            'valid_from_time' => 'required',
        ]);

        // Crear un nuevo objeto VisitorPass y guardar los datos
        $visitorPass = new VisitorPass();
        $visitorPass->property_code = $property_code;
        $visitorPass->visitor_name = $request->input('visitor_name');
        $visitorPass->visitor_phone = $request->input('visitor_phone');
        $visitorPass->license_plate = $request->input('license_plate');
        $visitorPass->year = $request->input('year');
        $visitorPass->make = $request->input('make');
        $visitorPass->model = $request->input('model');
        $visitorPass->color = $request->input('color');
        $visitorPass->vehicle_type = $request->input('vehicle_type');
        $visitorPass->resident_name = $request->input('resident_name');
        $visitorPass->unit_number = $request->input('unit_number');
        $visitorPass->resident_phone = $request->input('resident_phone');
        $visitorPass->valid_from = $request->input('valid_from_date') . ' ' . $request->input('valid_from_time');
        $visitorPass->save();

        // Redireccionar o mostrar un mensaje de éxito si es necesario
        return redirect()->route('list.visitors', ['property_code' => $property_code])->with('successMessage', 'Vehicle saved successfully.');
    }

}
