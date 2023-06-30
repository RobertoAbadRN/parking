<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Vehicle;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class VehiclesController extends Controller
{
    public function index()
{
    $vehicles = Property::select('properties.property_code', 'properties.address as property_address')
        ->selectRaw('COUNT(vehicles.property_code) as vehicle_count')
        ->selectRaw('SUM(CASE WHEN vehicles.permit_status = "pending" THEN 1 ELSE 0 END) as nopermit')
        ->selectRaw('SUM(CASE WHEN vehicles.permit_status = "expired" THEN 1 ELSE 0 END) as expired')
        ->selectRaw('SUM(CASE WHEN vehicles.permit_status = "suspended" THEN 1 ELSE 0 END) as suspended')
        ->leftJoin('vehicles', 'properties.property_code', '=', 'vehicles.property_code')
        ->groupBy('properties.property_code')
        ->get();

    $nopermit = $vehicles->sum('nopermit');
    $expired = $vehicles->sum('expired');
    $suspended = $vehicles->sum('suspended');

    return view('vehicles.index', compact('vehicles', 'nopermit', 'expired', 'suspended'));
}

    

    public function create($property_code)
    {
        $property = Property::where('property_code', $property_code)->first();
        $properties = Property::pluck('address', 'property_code');

        return view('vehicles.addvehicle', compact('property', 'properties'));
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

        // Crear una nueva instancia del modelo Vehicle y asignar los valores de los campos
        $vehicle = new Vehicle();
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
            // Generar el contenido del PDF
            $pdfContent = $this->generatePdfContent($vehicle);

            // Devolver la respuesta PDF al navegador
            $response = new Response($pdfContent);
            $response->header('Content-Type', 'application/pdf');
            $response->header('Content-Disposition', 'inline; filename="vehicle_information.pdf"');
            return $response;
        }

        $property_code = $request->input('property_code');

        return redirect()->route('properties.vehicles', ['property_code' => $property_code])->with('success_message', 'Vehicle saved successfully');

    }

    private function generatePdfContent($vehicle)
    {
        // Configuración de Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');

        // Crear una instancia de Dompdf con las opciones configuradas
        $dompdf = new Dompdf($options);

        // Generar el contenido HTML del documento
        $html = '
        <html>
        <head>
            <style>
                /* Estilos CSS para el documento */
            </style>
        </head>
        <body>
            <h1>Vehicle Information</h1>
            <p>Resident Name: ' . $vehicle->resident_name . '</p>
            <p>Email: ' . $vehicle->email . '</p>
            <!-- Agrega aquí los demás campos del formulario -->
        </body>
        </html>
        ';

        // Cargar el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el contenido HTML en PDF
        $dompdf->render();

        // Obtener el contenido PDF generado
        return $dompdf->output();
    }

    public function edit($id, $property_code)
    {
        $vehicle = Vehicle::find($id);
        $property = Property::where('property_code', $property_code)->first();
        $properties = Property::pluck('address', 'property_code');
        return view('vehicles.editvehicle', compact('vehicle', 'property', 'properties'));
    }

    public function update(Request $request, $id)
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

        // Obtener el vehículo existente
        $vehicle = Vehicle::findOrFail($id);

        // Actualizar los valores de los campos
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

        // Guardar el vehículo actualizado en la base de datos
        $vehicle->save();

        // Redireccionar o mostrar un mensaje de éxito
        $property_code = $request->input('property_code');

        return redirect()->route('properties.vehicles', ['property_code' => $property_code])->with('success_message', 'Vehicle saved successfully');

    }

    public function destroy(Vehicle $vehicle, $property_code)
    {
        // Realiza las acciones necesarias para eliminar el vehículo, por ejemplo:
        $vehicle->delete();

        return redirect()->route('properties.vehicles', ['property_code' => $property_code])->with('success_message', 'Vehicle deleted successfully');
    }


   

}
