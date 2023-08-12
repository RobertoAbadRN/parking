<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\RemolcarAutoMail;
use App\Models\Department;
use App\Models\Property;
use App\Models\Resident;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class VehiclesController extends Controller
{

    public function index()
    {

        $vehicles = Property::select('properties.property_code', 'properties.address as property_address')

            ->selectRaw('COUNT(departments.property_code) as vehicle_count')

            ->selectRaw('SUM(CASE WHEN departments.permit_status = "pending" THEN 1 ELSE 0 END) as nopermit')

            ->selectRaw('SUM(CASE WHEN departments.permit_status = "expired" THEN 1 ELSE 0 END) as expired')

            ->selectRaw('SUM(CASE WHEN departments.permit_status = "suspended" THEN 1 ELSE 0 END) as suspended')

            ->leftJoin('departments', 'properties.property_code', '=', 'departments.property_code')

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

        $properties = Property::pluck('name', 'property_code');

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
            'user_id' => 'required',
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
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        // Verificar si la validación falla
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Obtener los datos enviados por el formulario
        $data = $request->only([
            'license_plate', 'user_id', 'apart_unit', 'vin', 'make', 'model', 'year', 'color',
            'vehicle_type', 'property_code', 'permit_type', 'start_date', 'end_date', 'permit_status',
        ]);

        // Crear y guardar el registro en la tabla vehicles
        $vehicle = Vehicle::create($data);

         // Buscar la propiedad correspondiente en la base de datos
         $property = Property::where('property_code', $request->input('property_code'))->first();
    
         // Extraer el nombre de la propiedad
         $property_name = $property->name;
     
         // Extraer el campo 'logo' de la propiedad
         $logo = $property->logo;
     
         // Verificar qué botón se presionó
         if ($request->has('savePrintButton')) {
             // Si se presionó el botón "Print", enviar los datos del vehículo, el nombre de la propiedad y el campo 'logo' a la vista
             return view('vehicles/printable_document', compact('vehicle', 'property_name', 'logo'));
         }

        $property_code = $request->input('property_code');

        return redirect()->route('properties.vehicles', ['property_code' => $property_code])->with('success_message', 'Vehicle saved successfully');
    }

    public function edit($id, $property_code)
    {

        $vehicle = Vehicle::find($id);

        $property = Property::where('property_code', $property_code)->first();

        $user = User::find($vehicle->user_id); // Obtener el usuario asociado al vehículo

        $departament = Department::where('user_id', $user->id)->first(); // Obtener el departamento asociado al usuario

        $properties = Property::pluck('address', 'property_code');

        return view('vehicles.editvehicle', compact('vehicle', 'property', 'user', 'departament', 'properties', 'id'));

    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'license_plate' => 'required',
            'vin' => 'required',
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'vehicle_type' => 'required',
            'permit_status' => 'required',
            'permit_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
    
        // Find the vehicle by its ID
        $vehicle = Vehicle::findOrFail($id);
    
        // Convert the start_date and end_date to Carbon objects
        $start_date = Carbon::createFromFormat('Y-m-d', $request->input('start_date'));
        $end_date = Carbon::createFromFormat('Y-m-d', $request->input('end_date'));
    
        // Update the vehicle data with the new values from the form
        $vehicle->update([
            'license_plate' => $request->input('license_plate'),
            'vin' => $request->input('vin'),
            'make' => $request->input('make'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'color' => $request->input('color'),
            'vehicle_type' => $request->input('vehicle_type'),
            'permit_status' => $request->input('permit_status'),
            'permit_type' => $request->input('permit_type'),
            'start_date' => $start_date, // Guardar como objeto Carbon
            'end_date' => $end_date, // Guardar como objeto Carbon
            'property_code' => $request->input('property_code'),
        ]);
    
        // Buscar la propiedad correspondiente en la base de datos
        $property = Property::where('property_code', $request->input('property_code'))->first();
    
        // Extraer el nombre de la propiedad
        $property_name = $property->name;
    
        // Extraer el campo 'logo' de la propiedad
        $logo = $property->logo;
    
        // Verificar qué botón se presionó
        if ($request->has('savePrintButton')) {
            // Si se presionó el botón "Print", enviar los datos del vehículo, el nombre de la propiedad y el campo 'logo' a la vista
            return view('vehicles/printable_document', compact('vehicle', 'property_name', 'logo'));
        }
        $property_code = $request->input('property_code');
    
        return redirect()->route('properties.vehicles', ['property_code' => $property_code])->with('success_message', 'Vehicle updated successfully');
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
            //dd($vehicle);

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

    public function suspendVehicle($id)
    {
        $vehicle = Vehicle::find($id);

        if ($vehicle) {
            $vehicle->update(['permit_status' => 'suspended']);

            // Obtener todos los inspectores de estacionamiento y enviarles un correo electrónico
            $parkingInspectors = User::where('access_level', 'parking_inspector')->get();

            foreach ($parkingInspectors as $inspector) {
                Mail::to($inspector->email)->send(new RemolcarAutoMail($vehicle->license_plate));
            }

            return redirect()->back()->with('success', 'Vehicle suspended and email sent.');
        }

        return redirect()->back()->with('error', 'Vehicle not found.');
    }
    public function updateStatus(Request $request, $vehicleId)
{
    try {
        // Encontrar el vehículo por su ID
        $vehicle = Vehicle::findOrFail($vehicleId);

        // Actualizar el campo 'status' a 'approved'
        $vehicle->status = 'approved';
        $vehicle->save();

        // Enviar un mensaje a la vista usando with()
        return Redirect::back()->with('success_message', 'Vehicle status updated to Approved');

    } catch (\Exception $e) {
        // Si ocurre un error, redirigir con un mensaje de error
        return Redirect::back()->with('error_message', 'Error updating vehicle status');
    }
}

}
