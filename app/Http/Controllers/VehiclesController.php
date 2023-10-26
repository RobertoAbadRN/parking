<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\RemolcarAutoMail;
use App\Models\Department;
use App\Models\EmailAproved;
use App\Models\EmailSuspend;
use App\Models\Property;
use App\Models\PropertySetting;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class VehiclesController extends Controller
{

    public function index()
    {
        $user = Auth::user(); // Obtén el usuario autenticado

        if ($user->hasRole('Company administrator')) {
            // Si el usuario tiene el rol 'Company Administrator', puede ver todos los vehículos
            $propertiesWithTotalVehicles = Property::leftJoin('vehicles', 'properties.property_code', '=', 'vehicles.property_code')
                ->select(
                    'properties.name as propertyname',
                    'properties.property_code',
                    DB::raw('SUM(CASE WHEN vehicles.permit_status != "no permit" THEN 1 ELSE 0 END) as total_vehicles'),
                    DB::raw('SUM(CASE WHEN vehicles.permit_status = "no permit" THEN 1 ELSE 0 END) as no_permit'),
                    DB::raw('SUM(CASE WHEN vehicles.permit_status = "suspended" THEN 1 ELSE 0 END) as suspended'),
                    DB::raw('SUM(CASE WHEN vehicles.permit_status = "expired" THEN 1 ELSE 0 END) as expired')
                )
                ->groupBy('properties.id', 'properties.name', 'properties.property_code')
                ->get();
        } elseif ($user->hasRole('Property manager')) {
            // Si el usuario tiene el rol 'Property Manager', obtén su property_code
            $propertyCode = $user->property_code;

            // Luego, puedes usar este property_code para filtrar la consulta de los vehículos
            $propertiesWithTotalVehicles = Property::leftJoin('vehicles', 'properties.property_code', '=', 'vehicles.property_code')
                ->where('properties.property_code', $propertyCode)
                ->select(
                    'properties.name as propertyname',
                    'properties.property_code',
                    DB::raw('SUM(CASE WHEN vehicles.permit_status != "no permit" THEN 1 ELSE 0 END) as total_vehicles'),
                    DB::raw('SUM(CASE WHEN vehicles.permit_status = "no permit" THEN 1 ELSE 0 END) as no_permit'),
                    DB::raw('SUM(CASE WHEN vehicles.permit_status = "suspended" THEN 1 ELSE 0 END) as suspended'),
                    DB::raw('SUM(CASE WHEN vehicles.permit_status = "expired" THEN 1 ELSE 0 END) as expired')
                )
                ->groupBy('properties.id', 'properties.name', 'properties.property_code')
                ->get();
        } else {
            // Otros casos o roles desconocidos
            abort(403, 'Acceso no autorizado');
        }

        // Devuelve la vista 'vehicles.index' y pasa los datos de los registros como variable "propertiesWithTotalVehicles"
        return view('vehicles.index', compact('propertiesWithTotalVehicles'));
    }

    public function create($property_code)
    {

        $property = Property::where('property_code', $property_code)->first();

        $properties = Property::pluck('name', 'property_code');

        return view('vehicles.addvehicle', compact('property', 'properties'));

    }

    public function registerVehicle(Request $request)
    {
        //dd($request);
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
        ]);

        if ($validator->fails()) {
            // Manejar errores de validación
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Los datos pasaron la validación, ahora puedes acceder a los campos individualmente
        $user_id = $request->input('user_id');
        $license_plate = $request->input('license_plate');
        $vin = $request->input('vin');

        // Verificar si ya existe un vehículo con la misma placa o VIN
        $existingVehicle = Vehicle::where('license_plate', $license_plate)
            ->orWhere('vin', $vin)
            ->first();

        if ($existingVehicle) {
            // Si el vehículo ya existe, redirigir con mensaje de error
            return redirect()->back()->with('error', 'Vehicle with the same license plate or VIN already exists.');
        }

        // Continuar con la creación y guardado del vehículo
        $make = $request->input('make');
        $model = $request->input('model');
        $year = $request->input('year');
        $color = $request->input('color');
        $vehicle_type = $request->input('vehicle_type');
        $property_code = $request->input('property_code');
        $permit_status = 'pending'; // Establecer el estado del permiso como "pending"

        // Obtiene el property_name según el property_code
        $property = Property::where('property_code', $property_code)->first();

        if (!$property) {
            // Manejar el caso en el que el property_code no se encuentre en la base de datos
            return redirect()->back()->with('error', 'Property not found for the given property_code.');
        }

        $property_name = $property->name;

        // Guardar en la tabla vehicles
        $vehicle = new Vehicle([
            'user_id' => $user_id,
            'property_code' => $property_code,
            'permit_status' => $permit_status,
            'license_plate' => $license_plate,
            'vin' => $vin,
            'make' => $make,
            'model' => $model,
            'year' => $year,
            'color' => $color,
            'vehicle_type' => $vehicle_type,
        ]);

        $vehicle->save();

        // Realizar cualquier otra acción necesaria, como redireccionar a la vista de registro
        return view('registration')->with([
            'success' => 'Resident and vehicle registered successfully.',
            'user_id' => $user_id,
            'property_code' => $property_code,
            'property_name' => $property_name,
            'permit_status' => $permit_status,
            'license_plate' => $license_plate,
            'vin' => $vin,
            'make' => $make,
            'model' => $model,
            'year' => $year,
            'color' => $color,
            'vehicle_type' => $vehicle_type,
            // Agrega cualquier otro dato que desees pasar a la vista aquí
        ]);

    }

    public function store(Request $request)
    {
        // dd($request);

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
        // dd($validator);

        // Verificar si la validación falla
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Obtener los datos enviados por el formulario
        $data = $request->only([
            'license_plate', 'user_id', 'apart_unit', 'vin', 'make', 'model', 'year', 'color',
            'vehicle_type', 'property_code', 'permit_type', 'start_date', 'end_date', 'permit_status', 'reserved_space',
        ]);
        //dd($data);

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

        $departament = Department::where('user_id', $user->id)->first();
        $properties = Property::pluck('address', 'property_code');

        // Inicializa $reservedSpace en null por defecto
        $reservedSpace = null;

        if ($departament) {
            $reservedSpace = $departament->reserved_space;
            $leaseExpiration = $departament->lease_expiration;
        }

        return view('vehicles.editvehicle', compact('vehicle', 'property', 'user', 'departament', 'properties', 'id', 'reservedSpace', 'leaseExpiration'));

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
            'reserved_space' => 'required',
            'end_date' => 'required',
        ]);
        //dd($request);

        // Find the vehicle by its ID
        $vehicle = Vehicle::findOrFail($id);
        //dd( $vehicle);

        // Convert the start_date and end_date to Carbon objects
        //$start_date = Carbon::createFromFormat('Y-m-d', $request->input('start_date'));
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
            'end_date' => $end_date, // Guardar como objeto Carbon
            'property_code' => $request->input('property_code'),
        ]);

        // Actualizar el valor 'reserved_space' en la tabla 'departments' asociado al usuario
        $user = $vehicle->user;
        $department = Department::where('user_id', $user->id)->first();

        if ($department) {
            $department->reserved_space = $request->input('reserved_space');
            $department->lease_expiration = $end_date;
            $department->save();
        }

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
            ->join('users', 'vehicles.user_id', '=', 'users.id')
            ->leftJoin('departments', 'users.id', '=', 'departments.user_id')
            ->select('vehicles.*', 'properties.name as property_name', 'properties.logo', 'vehicles.license_plate', 'vehicles.permit_type', 'users.name', 'departments.apart_unit as unit_number')
            ->find($id);

        $code = $vehicle->property_code;
        $property = Property::where('property_code', $code)->first();
        $propertySetting = null; // Inicializa como null por defecto.

        if ($property) {
            $propertyId = $property->id;

            $propertySetting = PropertySetting::where('property_id', $propertyId)->first();
        }

        // Obtén el valor de 'lease_expiration' como una cadena de texto desde la relación 'departments'
        $lease_expirationString = $vehicle->user->departments->first()->lease_expiration;

        // Obtén el 'unit_number' directamente desde la consulta SQL
        $unit_number = $vehicle->unit_number;

        $start_date = Carbon::parse($vehicle->created_at);
        $license_plate = $vehicle->license_plate;

        // Obtén el idioma preferido del usuario desde la tabla 'departments'
        $preferedLanguage = $vehicle->user->departments->first()->prefered_language;

        // Define el nombre de la vista según el idioma preferido
        $viewName = $preferedLanguage === 'spanish' ? 'vehicles.showspanish' : 'vehicles.showenglish';

        return view($viewName, [
            'vehicle' => $vehicle,
            'property_name' => $vehicle->property_name,
            'logo' => $vehicle->logo,
            'start_date' => $start_date,
            'end_date' => $lease_expirationString,
            'license_plate' => $license_plate,
            'permit_type' => $vehicle->permit_type,
            'name' => $vehicle->name,
            'unit_number' => $unit_number, // Agregar el número de departamento a la vista
            'propertySetting' => $propertySetting, // Agrega el objeto $propertySetting a la vista
        ]);
    }

    public function excel_vehicles()
    {
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

    public function suspendVehicle1($id)
    {
        $vehicle = Vehicle::find($id);

        if ($vehicle) {
            $vehicle->update(['permit_status' => 'suspended']);

            // Obtener todos los inspectores de estacionamiento y enviarles un correo electrónico
            $parkingInspectors = User::role('Parking inspector')->get();

            foreach ($parkingInspectors as $inspector) {
                Mail::to($inspector->email)->send(new RemolcarAutoMail($vehicle->license_plate));
            }

            return redirect()->back()->with('success', 'Vehicle suspended and email sent.');
        }

        return redirect()->back()->with('error', 'Vehicle not found.');
    }

    public function suspendVehicle($id)
    {
        // Encontrar el vehículo por su ID
        $vehicle = Vehicle::find($id);

        // Verificar si el vehículo existe
        if (!$vehicle) {
            return redirect()->back()->with('error', 'Vehicle not found.');
        }

        // Acceder al valor de property_code desde el vehículo
        $propertyCode = $vehicle->property_code;

        // Verificar si existe una configuración de correo para el property_code
        $emailSetting = EmailSuspend::where('property_code', $propertyCode)->first();

        // Obtener el usuario asociado al vehículo
        $user = $vehicle->user;

        // Verificar si se encontró un usuario
        if ($user) {
            // Realizar una consulta para obtener el nombre de la propiedad
            $property_name = DB::table('users')
                ->join('properties', 'users.property_code', '=', 'properties.property_code')
                ->where('users.id', $user->id)
                ->value('properties.name');

            // Determinar la plantilla de correo a utilizar
            $emailTemplate = $emailSetting ? 'emails.permitdinamic_suspended' : 'emails.permit_suspended';

            // Envío del correo
            Mail::send($emailTemplate, [
                'user' => $user,
                'property_name' => $property_name,
                'emailSetting' => $emailSetting,
            ], function ($message) use ($user) {
                $message->to($user->email, $user->name)
                    ->subject('Parking Permit Suspended');
            });

            // Actualizar el estado del permiso a 'suspended'
            $vehicle->update(['permit_status' => 'suspended']);

            return redirect()->back()->with('success_message', 'Vehicle suspended and email sent.');
        } else {
            // Si no se encuentra un usuario asociado al vehículo, redirigir con un mensaje de error
            return redirect()->back()->with('error_message', 'Error suspending vehicle: User not found.');
        }
    }

    public function updateStatus(Request $request, $vehicleId)
    {
        try {
            // Encontrar el vehículo por su ID
            $vehicle = Vehicle::findOrFail($vehicleId);
            // Acceder al valor de property_code desde el vehículo
            $propertyCode = $vehicle->property_code;

            // Verificar si existe una configuración de correo para el property_code
            $emailSetting = EmailAproved::where('property_code', $propertyCode)->first();

            // Actualizar el campo 'permit_status' a 'approved'
            $vehicle->permit_status = 'approved';
            $vehicle->save();

            // Obtener el usuario asociado al vehículo
            $user = $vehicle->user;

            // Determinar la plantilla de correo a utilizar
            $emailTemplate = $emailSetting ? 'emails.permitdinamic_active' : 'emails.permit_active';

            // Realizar una consulta para obtener el nombre de la propiedad
            $property_name = DB::table('users')
                ->join('properties', 'users.property_code', '=', 'properties.property_code')
                ->where('users.id', $user->id)
                ->value('properties.name');

            $resident = $user; // Esto es un ejemplo, asegúrate de obtener el residente correcto

            // Envío del correo
            Mail::send($emailSetting ? 'emails.permitdinamic_active' : 'emails.permit_active', [
                'resident' => $resident,
                'property_name' => $property_name, // Siempre pasamos $property_name
                'emailSetting' => $emailSetting, // Pasamos $emailSetting solo si está definido
            ], function ($message) use ($user) {
                $message->to($user->email, $user->name)
                    ->subject('Your Parking Permit is Active');
            });

            // Enviar un mensaje a la vista usando with()
            return Redirect::back()->with('success_message', 'Vehicle status updated to Approved');
        } catch (\Exception $e) {
            // Si ocurre un error, redirigir con un mensaje de error
            return Redirect::back()->with('error_message', 'Error updating vehicle status: ' . $e->getMessage());
        }
    }

    public function printPDF(Request $request)
    {
        // Obtiene el ID del vehículo desde la solicitud POST
        $vehicleId = $request->input('vehicle_id');

        // Obtén los datos que deseas pasar a la vista utilizando la consulta
        $vehicle = Vehicle::join('properties', 'vehicles.property_code', '=', 'properties.property_code')
            ->join('users', 'vehicles.user_id', '=', 'users.id')
            ->leftJoin('departments', 'users.id', '=', 'departments.user_id')
            ->select('vehicles.*', 'properties.name as property_name', 'properties.logo', 'vehicles.license_plate', 'users.name', 'departments.apart_unit as unit_number', 'departments.prefered_language')
            ->find($vehicleId);
        // dd(  $vehicle);

        $code = $vehicle->property_code;
        $property = Property::where('property_code', $code)->first();
        $propertySetting = null; // Inicializa como null por defecto.

        if ($property) {
            $propertyId = $property->id;

            $propertySetting = PropertySetting::where('property_id', $propertyId)->first();
           // dd($propertySetting);
        }

        // Asegúrate de que $vehicle no sea nulo antes de continuar
        if (!$vehicle) {
            // Manejar el caso en que el vehículo no se encuentra
            abort(404);
        }
        $start_date = Carbon::parse($vehicle->created_at);
        // Obtén el valor de 'lease_expiration' como una cadena de texto desde la relación 'departments'
        $lease_expirationString = $vehicle->user->departments->first()->lease_expiration;
        // Obtén el 'unit_number' directamente desde la consulta SQL
        $unit_number = $vehicle->unit_number;

        // Crea una instancia de Dompdf con opciones
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->setIsRemoteEnabled(true);
        $dompdf = new Dompdf($options);

        // Obtén la ruta relativa de la imagen desde el campo 'logo' en la base de datos
        $imageRelativePath = $vehicle->logo;
// Convierte la ruta relativa en una URL completa
        $imageURL = asset($imageRelativePath);

        // Verificar el idioma preferido y seleccionar la vista correspondiente
        $preferredLanguage = $vehicle->prefered_language;

        if ($preferredLanguage === 'english') {
            // Renderiza la vista Blade como HTML
            $html = view('vehicles.printinglish', [
                'vehicle' => $vehicle,
                'property_name' => $vehicle->property_name,
                'license_plate' => $vehicle->license_plate,
                'permit_type' => $vehicle->permit_type,
                'logo' => $imageURL,
                'start_date' => $start_date,
                'end_date' => $lease_expirationString,
                'name' => $vehicle->name,
                'unit_number' => $unit_number,
                'propertySetting' => $propertySetting, // Agrega el objeto $propertySetting a la vista
                // Agrega otras variables según sea necesario
            ])->render();
        } elseif ($preferredLanguage === 'spanish') {
            $html = view('vehicles.printspanish', [
                // ... Variables para la vista en español ...
                'vehicle' => $vehicle,
                'property_name' => $vehicle->property_name,
                'license_plate' => $vehicle->license_plate,
                'permit_type' => $vehicle->permit_type,
                'logo' => $imageURL,
                'start_date' => $start_date,
                'end_date' => $lease_expirationString,
                'name' => $vehicle->name,
                'unit_number' => $unit_number,
                'propertySetting' => $propertySetting, // Agrega el objeto $propertySetting a la vista
            ])->render();
        }

        // Carga el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Establece el tamaño y orientación de la página (por ejemplo, A4)
        $dompdf->setPaper('A4', 'portrait');

        // Renderiza el PDF
        $dompdf->render();

        // Devuelve el PDF como una respuesta para mostrarlo o descargarlo
        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="tu-archivo.pdf"', // Abre en el visor de PDF en lugar de descargar
        ]);
    }

}
