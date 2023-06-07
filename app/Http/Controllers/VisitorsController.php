<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorPass;


class VisitorsController extends Controller
{
    public function index($property_code)
    {
        return view('visitors/addvisitors', ['property_code' => $property_code] );
    }
    public function show()
    {
        return view('visitors/index' );   
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
       $valid_from = $request->input('valid_from_date') . ' ' . $request->input('valid_from_time');

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
    
   
}
