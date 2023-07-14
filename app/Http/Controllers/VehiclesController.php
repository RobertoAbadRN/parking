<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Vehicle;
use App\Models\Resident;
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

        // Obtener todos los valores del formulario
        $formData = $request->all();

        // Obtener los valores individuales
        $license_plate = $request->input('license_plate');
        $resident_name = $request->input('resident_name');
        $apart_unit = $request->input('apart_unit');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $preferred_language = $request->input('preferred_language');

        // Crear una nueva instancia del modelo Vehicle y asignar los valores de los campos
        $vehicle = new Vehicle();
        $vehicle->property_code = $formData['property_code'];
        $vehicle->license_plate = $license_plate;
        $vehicle->vin = $formData['vin'];
        $vehicle->make = $formData['make'];
        $vehicle->model = $formData['model'];
        $vehicle->year = $formData['year'];
        $vehicle->color = $formData['color'];
        $vehicle->vehicle_type = $formData['vehicle_type'];
        // Asignar cualquier otra propiedad necesaria en tu modelo "Vehicle"
        $vehicle->save();

        // Crear una nueva instancia del modelo Resident y asignar los valores de los campos
        $resident = new Resident();
        $resident->resident_name = $resident_name;
        $resident->apart_unit = $apart_unit;
        $resident->email = $email;
        $resident->phone = $phone;
        $resident->property_code = $formData['property_code'];
        $resident->preferred_language = $preferred_language;
        $resident->reserved_space = $formData['reserved_space'];
        $resident->resident_status = 'Pending';
        // Asignar cualquier otra propiedad necesaria en tu modelo "Resident"
        $resident->save();


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
