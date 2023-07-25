<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departament;
use App\Models\Property;
use App\Models\Resident;
use App\Models\User; // Importar el modelo Departament
use App\Models\Vehicle;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class VehiclesController extends Controller
{
    public function index()
    {
        $vehicles = Property::select('properties.property_code', 'properties.address as property_address')
            ->selectRaw('COUNT(departaments.property_code) as vehicle_count')
            ->selectRaw('SUM(CASE WHEN departaments.permit_status = "pending" THEN 1 ELSE 0 END) as nopermit')
            ->selectRaw('SUM(CASE WHEN departaments.permit_status = "expired" THEN 1 ELSE 0 END) as expired')
            ->selectRaw('SUM(CASE WHEN departaments.permit_status = "suspended" THEN 1 ELSE 0 END) as suspended')
            ->leftJoin('departaments', 'properties.property_code', '=', 'departaments.property_code')
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

        // Registrar el vehículo en la tabla vehicles
        $vehicle = new Vehicle();
        $vehicle->property_code = $property_code;
        $vehicle->license_plate = $license_plate;
        $vehicle->vin = $vin;
        $vehicle->make = $make;
        $vehicle->model = $model;
        $vehicle->year = $year;
        $vehicle->color = $color;
        $vehicle->vehicle_type = $vehicle_type;
        // Asignar cualquier otra propiedad necesaria en tu modelo "Vehicle"
        $vehicle->save();

        // Registrar el residente en la tabla residents
        $resident = new Resident();
        $resident->resident_name = $resident_name;
        $resident->apart_unit = $apart_unit;
        $resident->email = $email;
        $resident->phone = $phone;
        $resident->property_code = $property_code;
        $resident->preferred_language = $preferred_language;
        // Asignar cualquier otra propiedad necesaria en tu modelo "Resident"
        $resident->save();

        // Realizar cualquier otra acción necesaria, como redireccionar a una página de confirmación
        return redirect()->route('login')->with('success', 'Resident and vehicle registered successfully.');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'name' => 'required',
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

        // Obtener los valores individuales
        $license_plate = $request->input('license_plate');
        $name = $request->input('name');
        $apart_unit = $request->input('apart_unit');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $preferred_language = $request->input('preferred_language');
        $vin = $request->input('vin');
        $make = $request->input('make');
        $model = $request->input('model');
        $year = $request->input('year');
        $color = $request->input('color');
        $vehicle_type = $request->input('vehicle_type');
        $property_code = $request->input('property_code');
        $permit_status = $request->input('permit_status');
        $permit_type = $request->input('permit_type');
        $reserved_space = $request->input('reserved_space');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

// Buscar el usuario existente por correo electrónico
        $user = User::where('email', $email)->first();

        if ($user) {
            // El usuario ya existe, asociar el vehículo y el departamento al usuario existente
            $vehicle = new Vehicle();
            // Asignar los valores del vehículo
            $vehicle->property_code = $property_code;
            $vehicle->license_plate = $license_plate;
            $vehicle->vin = $vin;
            $vehicle->make = $make;
            $vehicle->model = $model;
            $vehicle->year = $year;
            $vehicle->color = $color;
            $vehicle->vehicle_type = $vehicle_type;
            $vehicle->permit_type = $permit_type;
            $vehicle->start_date = $start_date;
            $vehicle->end_date = $end_date;

            // Guardar el vehículo
            $vehicle->save();

            $departament = new Departament();
            // Asignar los valores del departamento
            $departament->apart_unit = $apart_unit;
            $departament->reserved_space = $reserved_space;
            $departament->property_code = $property_code;
            $departament->permit_status = $permit_status;

            // Guardar el departamento
            $departament->save();

            // Asociar el vehículo y el departamento al usuario existente
            $user->vehicles()->save($vehicle);
            $user->departaments()->save($departament);
        } else {
            // El usuario no existe, crear un nuevo usuario
            $newUser = new User();
            // Asignar los valores del nuevo usuario
            $newUser->name = $name;
            $newUser->email = $email;
            $newUser->phone = $phone;
            $newUser->preferred_language = $preferred_language;
            $newUser->property_code = $property_code;
            // Guardar el nuevo usuario
            $newUser->save();

            // Crear el vehículo asociado al nuevo usuario
            $vehicle = new Vehicle();
            // Asignar los valores del vehículo
            $vehicle->property_code = $property_code;
            $vehicle->license_plate = $license_plate;
            $vehicle->vin = $vin;
            $vehicle->make = $make;
            $vehicle->model = $model;
            $vehicle->year = $year;
            $vehicle->color = $color;
            $vehicle->vehicle_type = $vehicle_type;
            $vehicle->permit_type = $permit_type;
            $vehicle->start_date = $start_date;
            $vehicle->end_date = $end_date;

            // Asociar el vehículo al nuevo usuario
            $newUser->vehicles()->save($vehicle);

            // Crear el departamento asociado al nuevo usuario
            $departament = new Departament();
            // Asignar los valores del departamento
            $departament->apart_unit = $apart_unit;
            $departament->reserved_space = $reserved_space;
            $departament->property_code = $property_code;
            $departament->permit_status = $permit_status;
            // Asociar el departamento al nuevo usuario
            $newUser->departaments()->save($departament);
        }

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
            <p>Resident Name: ' . $vehicle->name . '</p>
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
        $user = User::find($vehicle->user_id); // Obtener el usuario asociado al vehículo
        $departament = Departament::where('user_id', $user->id)->first(); // Obtener el departamento asociado al usuario
        $properties = Property::pluck('address', 'property_code');

        return view('vehicles.editvehicle', compact('vehicle', 'property', 'user', 'departament', 'properties', 'id'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            // Validation rules here
        ]);
    
        // Verificar si la validación falla
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Obtener el vehículo existente
        $vehicle = Vehicle::find($id);
    
        // Verificar si el vehículo existe
        if (!$vehicle) {
            return redirect()->back()->with('error_message', 'Vehicle not found.');
        }
    
        // Actualizar los valores de los campos del vehículo
        $vehicle->update([
            // Update fields here for the Vehicle model
            'property_code' => $request->input('property_code'),
            'license_plate' => $request->input('license_plate'),
            'vin' => $request->input('vin'),
            'make' => $request->input('make'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'color' => $request->input('color'),
            'vehicle_type' => $request->input('vehicle_type'),
            'permit_type' => $request->input('permit_type'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);
    
        // Obtener el usuario asociado al vehículo
        $user = $vehicle->user;
    
        // Verificar si el usuario existe
        if (!$user) {
            return redirect()->back()->with('error_message', 'User not found.');
        }
    
        // Actualizar los valores de los campos del usuario
        $user->update([
            // Update fields here for the User model
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'preferred_language' => $request->input('preferred_language'),
        ]);
    
        // Obtener el departamento asociado al usuario
        $departament = Departament::where('user_id', $user->id)->first();
    
        // Verificar si el departamento existe
        if (!$departament) {
            // Si el departamento no existe, crear uno nuevo y asociarlo al usuario
            $departament = new Departament([
                // Set any relevant fields for the new Departament record based on the request data
                'apart_unit' => $request->input('apart_unit'),
                'reserved_space' => $request->input('reserved_space'),
                'permit_status' => $request->input('permit_status'),
            ]);
            $departament->user_id = $user->id;
            $departament->save();
        } else {
            // Si el departamento existe, actualizar los valores de los campos
            $departament->update([
                // Update fields here for the Departament model
                'apart_unit' => $request->input('apart_unit'),
                'reserved_space' => $request->input('reserved_space'),
                'permit_status' => $request->input('permit_status'),
            ]);
        }
    
        $property_code = $request->input('property_code');
    
        return redirect()->route('properties.vehicles', ['property_code' => $property_code])->with('success_message', 'Vehicle saved successfully');
    }
    
    public function destroy(Vehicle $vehicle, $property_code)
    {
        // Realiza las acciones necesarias para eliminar el vehículo, por ejemplo:
        $vehicle->delete();
         // Obtener el departamento asociado al vehículo
    $department = $vehicle->department;

    // Eliminar el vehículo y el departamento
    $vehicle->delete();

    if ($department) {
        $department->delete();
    }

        return redirect()->route('properties.vehicles', ['property_code' => $property_code])->with('success_message', 'Vehicle deleted successfully');
    }

    public function listvehicles_excel($property_code)
    {

        // Create new Spreadsheet object
        // Crea una instancia de Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $datos = Vehicle::join('properties', 'properties.property_code', '=', 'vehicles.property_code')
            ->select('vehicles.id', 'vehicles.resident_name', 'vehicles.apart_unit', 'vehicles.preferred_language', 'vehicles.license_plate', 'vehicles.make', 'vehicles.reserved_space', 'vehicles.model', 'properties.address', 'vehicles.created_at', 'vehicles.permit_status', 'vehicles.email', 'vehicles.phone', 'vehicles.vehicle_type', 'vehicles.color', 'vehicles.vin', 'vehicles.start_date', 'vehicles.end_date')
            ->where('vehicles.property_code', $property_code)
            ->get();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Create at')
            ->setCellValue('B1', 'Recident Name')
            ->setCellValue('C1', 'Aparment/Unit')
            ->setCellValue('D1', 'Language')
            ->setCellValue('E1', 'License/Plate')
            ->setCellValue('F1', 'Make')
            ->setCellValue('G1', 'Model')
            ->setCellValue('H1', ' Reserved Space')
            ->setCellValue('I1', ' Permit Status')
            ->setCellValue('J1', ' E-mail')
            ->setCellValue('K1', ' Phone')
            ->setCellValue('L1', ' Color')
            ->setCellValue('M1', ' vin');
        $i = 2;
        foreach ($datos as $dato) {

            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $i, $dato->created_at)
                ->setCellValue('B' . $i, $dato->resident_name)
                ->setCellValue('C' . $i, $dato->apart_unit)
                ->setCellValue('D' . $i, $dato->preferred_language)
                ->setCellValue('E' . $i, $dato->license_plate)
                ->setCellValue('F' . $i, $dato->make)
                ->setCellValue('G' . $i, $dato->model)
                ->setCellValue('H' . $i, $dato->reserved_space)
                ->setCellValue('I' . $i, $dato->start_date . ', ' . $dato->end_date)
                ->setCellValue('J' . $i, $dato->email)
                ->setCellValue('K' . $i, $dato->phone)
                ->setCellValue('L' . $i, $dato->color)
                ->setCellValue('M' . $i, $dato->vin);

            $i++;
        }
        // Crea el archivo Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'list of vehicles.xlsx';
        $writer->save($filename);

        // Descargar el archivo
        $response = response()->download($filename)->deleteFileAfterSend();

        // Redireccionar a la página anterior después de la descarga
        $response->headers->set('Refresh', '0;url=' . url()->previous());

        return $response;
    }

    public function show($id)
    {
        $vehicle = Vehicle::join('properties', 'vehicles.property_code', '=', 'properties.property_code')
            ->select('vehicles.*', 'properties.name as property_name', 'properties.logo', 'vehicles.license_plate')
            ->find($id);

        $start_date = Carbon::parse($vehicle->start_date);
        $end_date = Carbon::parse($vehicle->end_date);
        $license_plate = $vehicle->license_plate;

        return view('vehicles.show', [
            'vehicle' => $vehicle,
            'property_name' => $vehicle->property_name,
            'logo' => $vehicle->logo,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'license_plate' => $license_plate,
        ]);
    }

    public function excel_vehicles()
    {

        // Create new Spreadsheet object
        // Crea una instancia de Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $datos = Property::select('properties.property_code', 'properties.address as property_address')
            ->selectRaw('COUNT(vehicles.property_code) as vehicle_count')
            ->selectRaw('SUM(CASE WHEN vehicles.permit_status = "pending" THEN 1 ELSE 0 END) as nopermit')
            ->selectRaw('SUM(CASE WHEN vehicles.permit_status = "expired" THEN 1 ELSE 0 END) as expired')
            ->selectRaw('SUM(CASE WHEN vehicles.permit_status = "suspended" THEN 1 ELSE 0 END) as suspended')
            ->leftJoin('vehicles', 'properties.property_code', '=', 'vehicles.property_code')
            ->groupBy('properties.property_code')
            ->get();

        $nopermit = $datos->sum('nopermit');
        $expired = $datos->sum('expired');
        $suspended = $datos->sum('suspended');

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Property')
            ->setCellValue('B1', 'Num. Vehicles')
            ->setCellValue('C1', 'Pre Registered (No Permit)')
            ->setCellValue('D1', 'Expired')
            ->setCellValue('E1', 'Suspended');
        $i = 2;
        foreach ($datos as $dato) {

            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $i, $dato->property_address)
                ->setCellValue('B' . $i, $dato->vehicle_count)
                ->setCellValue('C' . $i, $nopermit)
                ->setCellValue('D' . $i, $expired)
                ->setCellValue('E' . $i, $suspended);

            $i++;
        }
        // Crea el archivo Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'vehicles_count.xlsx';
        $writer->save($filename);

        // Descargar el archivo
        $response = response()->download($filename)->deleteFileAfterSend();

        // Redireccionar a la página anterior después de la descarga
        $response->headers->set('Refresh', '0;url=' . url()->previous());

        return $response;
    }

}
