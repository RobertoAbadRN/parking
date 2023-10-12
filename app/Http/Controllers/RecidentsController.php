<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SignAgreement;
use App\Models\AppSetting;
use App\Models\Department;
use App\Models\Property;
use App\Models\ResidentUpload;
use App\Models\ResidentUploadFile;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VisitorPass;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class RecidentsController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Obtén el usuario autenticado

        if ($user->hasRole('Company administrator')) {
            $properties = Property::select('properties.*', DB::raw('COALESCE(COUNT(users.id), 0) as user_count'))
                ->selectRaw('SUM(CASE WHEN users.status = "Pending" THEN 1 ELSE 0 END) as pending_count')
                ->selectRaw('SUM(CASE WHEN users.status = "Approved" THEN 1 ELSE 0 END) as approved_count')
                ->selectRaw('SUM(CASE WHEN users.status = "Suspended" THEN 1 ELSE 0 END) as suspended_count')
                ->leftJoin('users', function ($join) {
                    $join->on('properties.property_code', '=', 'users.property_code')
                        ->where('users.access_level', '=', 'Resident');
                })
                ->groupBy('properties.id')
                ->get();

            return view('residents.index-admin', compact('properties'));
        } elseif ($user->hasRole('Property manager')) {
            // Si el usuario tiene el rol 'Property Manager', obtener su property_code
            $propertyCode = $user->property_code;

            // Obtener los datos de la propiedad a la que pertenece el Property Manager
            $properties = DB::table('properties')
                ->leftJoin('users', function ($join) {
                    $join->on('properties.property_code', '=', 'users.property_code')
                        ->where('users.access_level', '=', 'Resident');
                })
                ->where('properties.property_code', $propertyCode) // Filtrar por property_code del Property Manager
                ->select(
                    'properties.name',
                    'properties.property_code',
                    DB::raw('COUNT(DISTINCT users.id) as user_count'),
                    DB::raw('SUM(CASE WHEN users.status = "approved" THEN 1 ELSE 0 END) as approved_count'),
                    DB::raw('SUM(CASE WHEN users.status = "suspended" THEN 1 ELSE 0 END) as suspended_count'),
                    DB::raw('SUM(CASE WHEN users.status = "pending" THEN 1 ELSE 0 END) as pending_count')
                )
                ->groupBy('properties.property_code', 'properties.name')
                ->get();

            return view('residents.index-admin', compact('properties'));
        }

        // Resto de tu código aquí...

        elseif ($user->hasRole('Resident')) {
            // Si el usuario tiene el rol 'Resident', obtener su nombre y detalles de vehículos
            $residentid = $user->id; // Agregar esta línea para obtener el ID del residente
            $residentName = $user->name;
            $residentEmail = $user->email;
            $residentDetails = $user->department; // Relación 'department' ya cargada desde la autenticación
            $residentVehicles = $user->vehicles; // Relación 'vehicles' ya cargada desde la autenticación
            $residentDepartment = $user->department;
            return view('residents.index', compact('residentid', 'residentName', 'residentEmail', 'residentDetails', 'residentVehicles', 'residentDepartment'));
        } else {
            // Otros casos o roles desconocidos
            abort(403, 'Unauthorized access');
        }

    }

    public function showResidents($propertyCode)
    {
        // Obtén todos los residentes que coincidan con el property_code y access_level = "Resident"
        $residents = DB::table('users')
            ->leftJoin('departments', 'users.id', '=', 'departments.user_id')
            ->where('users.property_code', $propertyCode)
            ->where('users.access_level', 'Resident')
            ->select('users.*', 'departments.apart_unit', 'departments.lease_expiration', 'departments.id as department_id', 'departments.reserved_space', 'departments.reserved_spacevisitors', 'departments.reserved', 'departments.terms_agreement_status', 'departments.date_status')
            ->get();

        // Obtén el nombre de la propiedad relacionada con el property_code
        $property = Property::where('property_code', $propertyCode)->first();

        // Accede al nombre de la propiedad
        $propertyName = $property->name;
        $propertyId = $property->id;
        // dd($propertyId);
        // Consulta los valores de vehicles_per_apartment y reserved_spot_per_apartment desde app_settings
        $appSettings = AppSetting::where('property_code', $propertyId)->first();
        //dd($appSettings);
        $vehiclesPerApartment = $appSettings ? $appSettings->vehicles_per_apartment : null;
        $reservedSpotPerApartment = $appSettings ? $appSettings->reserved_spot_per_apartment : null;
        //dd($reservedSpotPerApartment);

        return view('residents.residentslist', compact('residents', 'propertyName', 'propertyCode', 'vehiclesPerApartment', 'reservedSpotPerApartment'));
    }

    public function import()
    {
        return view('residents.import');
    }

    public function import_upload(Request $request)
    {
        $file_uloaded = $request->file('file');
        $file_info = $file_uloaded->getClientOriginalName();
        $filename = pathinfo($file_info, PATHINFO_FILENAME);
        $file_extension = pathinfo($file_info, PATHINFO_EXTENSION);
        $file_name = $filename . '-' . time() . '.' . $file_extension;
        $file_uloaded->move(public_path('uploads'), $file_name);
        $file_path = 'uploads\\' . $file_name;
        $full_path = public_path('uploads') . "\\" . $file_name;

        $new_resident_upload = new ResidentUpload();
        $new_resident_upload->file_name = $file_name;
        $new_resident_upload->file_name_original = $file_info;
        $new_resident_upload->file_extension = $file_extension;
        $new_resident_upload->file_path = $file_path;
        $new_resident_upload->full_path = $full_path;
        $new_resident_upload->save();

        if ($file_extension === "xlsx") {
            try {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $spreadsheet = $reader->load($file_path);
                $sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
                $sheet_data = $sheet->toArray();

                foreach ($sheet_data as $tmp_data) {
                    $new_resident_uploa_file = new ResidentUploadFile();
                    $new_resident_uploa_file->file_data = json_encode([
                        "resident_name" => $tmp_data[0],
                        "apartment" => $tmp_data[1],
                        "email" => $tmp_data[2],
                        "phone" => $tmp_data[3],
                        "lease_expiration" => $tmp_data[4],
                    ]);
                    $new_resident_uploa_file->upload_id = $new_resident_upload->id;
                    $new_resident_uploa_file->save();
                    var_dump($tmp_data);
                }
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'error' => 'Processing error',
                    'exception' => $e,
                ]);
            }
            return response()->json([
                'success' => true,
                'error' => '',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Wrong file type',
            ]);
        }
    }

    public function import_uploaded()
    {
        $resident_uploads = ResidentUpload::all();
        return view('residents.import-uploaded', compact('resident_uploads'));
    }

    public function import_uploaded_files(Request $request, $upload_id)
    {
        if (!$upload_id) {
            return redirect('residents.import.uploaded')->with('error', 'Uploaded file not found');
        }

        $resident_upload_files = ResidentUploadFile::select("*")->where("upload_id", $upload_id)->get();
        return view('residents.import-uploaded-files', compact('resident_upload_files', 'upload_id'));
    }

    public function import_uploaded_files_id(Request $request, $upload_id, $file_id)
    {
        if (!$upload_id) {
            return redirect('residents.import.uploaded')->with('error', 'File not found');
        }

        $resident_upload_file = ResidentUploadFile::select("*")->where([
            ["upload_id", $upload_id],
            ["id", $file_id],
        ])->get();
        if (sizeof($resident_upload_file) > 0) {
            $resident_upload_file = $resident_upload_file[0];
        }

        return view('residents.import-uploaded-files-id', compact('resident_upload_file'));
    }

    public function addResident($property_code)
    {
        // Obtén el id correspondiente al property_code
        $property = Property::where('property_code', $property_code)->first();

        if (!$property) {
            // Manejo de error si no se encuentra la propiedad con el property_code dado
            abort(404);
        }

        // Obtén todos los demás properties
        $properties = Property::all();

        return view('residents.addresident', compact('properties', 'property_code', 'property'));
    }

    public function approve(Request $request, $id)
    {
        $resident = User::find($id);
        if ($resident) {
            $resident->status = "Approved";
            $resident->save();
        }

        // Puedes obtener el propertyCode desde el modelo $resident si es relevante
        $propertyCode = $resident->property_code;

        // Obtener los detalles necesarios para el correo electrónico
        $user = $resident; // Esto asume que $user contiene los detalles necesarios para el correo electrónico
        $token = Str::random(40);
        $linkEnglish = route('terms-and-conditions-english', ['token' => $token, 'language' => 'english']);
        $linkSpanish = route('terms-and-conditions-spanish', ['token' => $token, 'language' => 'spanish']);

        // Enviar un correo electrónico al residente aprobado
        Mail::to($user->email)->send(new SignAgreement($user, $linkEnglish, $linkSpanish, $token));

        return redirect()->route('property.residents', ['propertyCode' => $propertyCode])
            ->with('success_message', 'Resident approved successfully!');
    }

    public function decline(Request $request, $id)
    {
        $resident = User::find($id);
        if ($resident) {
            $resident->status = "Declined"; // Cambia "Decline" a "Declined"
            $resident->save();
        }

        // Puedes obtener el propertyCode desde el modelo $resident si es relevante
        $propertyCode = $resident->property_code;

        return redirect()->route('property.residents', ['propertyCode' => $propertyCode])
            ->with('error-message', 'Resident rejected successfully!');
    }

    public function residentStore(Request $request)
    {
        //dd($request);
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string',
            'user' => 'required|string',
            'apart_unit' => 'required|string',
            'reserved_space' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'property_id' => 'required',
            'lease_expiration' => 'required|date',
            'prefered_language' => 'required',
        ]);
        //dd($request);
        // Busca un usuario existente con el mismo correo electrónico
        $existingUser = User::where('email', $request->input('email'))->first();

        if ($existingUser) {
            // Si el usuario existe, actualiza sus datos
            $user = $existingUser;
            $user->name = $request->input('name');
            $user->user = $request->input('user');
            $user->property_code = $request->input('property_code');
            $user->phone = $request->input('phone');
            $user->password = bcrypt($request->input('password')); // Opcional, actualiza la contraseña si es necesario
            $user->save();
        } else {
            // Crear un nuevo registro de usuario
            $user = new User();
            $user->name = $request->input('name');
            $user->user = $request->input('user');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->access_level = 'Resident';
            $user->property_code = $request->input('property_code');
            $user->banned = false;
            $user->status = 'Pending';
            $user->save();

            // Asignar el rol "Resident" al usuario
            $user->assignRole('Resident');
        }
        // Verifica si el usuario ya tiene un departamento asociado
        $existingDepartment = Department::where('user_id', $user->id)->first();
        if ($existingDepartment) {
            // Si ya tiene un departamento, actualiza sus datos
            $department = $existingDepartment;
            $department->apart_unit = $request->input('apart_unit');
            $department->reserved = $request->input('reserved_space');
            $department->property_code = $request->input('property_code');
            $department->terms_agreement_status = 'pending';
            $department->lease_expiration = $request->input('lease_expiration');
            $department->prefered_language = $request->input('prefered_language');
            $department->save();
        } else {

            // Crear un nuevo registro de departamento y asociarlo al usuario
            $department = new Department();
            $department->user_id = $user->id;
            $department->apart_unit = $request->input('apart_unit');
            $department->reserved = $request->input('reserved_space');
            $department->property_code = $request->input('property_code');
            $department->terms_agreement_status = 'pending';
            $department->lease_expiration = $request->input('lease_expiration');
            $department->prefered_language = $request->input('prefered_language');
            $department->save();
        }

        // Obtener la propiedad
        $property = Property::find($request->input('property_id'));

// Verificar si ya existe la relación
        if (!$user->properties->contains($property->id)) {
            // Si no existe, entonces la agregamos
            $user->properties()->attach($property);
        }

        // Generar y almacenar el token único
        $token = Str::random(40);
        $department->agreement_token = $token;
        $department->save();

        // Generar los enlaces para los términos y condiciones en inglés y español
        $linkEnglish = route('terms-and-conditions-english', ['token' => $token, 'language' => 'english']);
        $linkSpanish = route('terms-and-conditions-spanish', ['token' => $token, 'language' => 'spanish']);

        // Enviar un correo electrónico
        Mail::to($user->email)->send(new SignAgreement($user, $linkEnglish, $linkSpanish, $token));

        $propertyCode = $request->input('property_code');
        return redirect()->route('property.residents', ['propertyCode' => $propertyCode])->with('success_message', 'Resident registered successfully!');

    }

    public function edit(User $resident)
    {
        $departments = Department::where('user_id', $resident->id)->get();
        //dd($departments);
        $propertyCodes = $departments->pluck('property_code')->toArray();

        $properties = Property::all(); // Obtén todas las propiedades

        return view('residents.editresident', compact('resident', 'departments', 'properties'));
    }

    public function update(Request $request, User $resident)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user' => 'required|string|max:255',
            'apart_unit' => 'required|string|max:255',
            'reserved_space' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'lease_expiration' => 'required',
            // Agrega aquí las validaciones para los demás campos
        ]);

        //dd( $request);

        // Actualiza los campos en la tabla users relacionados con el usuario
        $resident->update([
            'name' => $request->name,
            'user' => $request->user,
            'phone' => $request->phone,
            'email' => $request->email,
            // Agrega aquí los demás campos que deseas actualizar en la tabla users
        ]);

        // Actualiza los campos en la tabla departments relacionados con el usuario
        $department = Department::where('user_id', $resident->id)->firstOrFail();
        $department->update([
            'apart_unit' => $request->apart_unit,
            'reserved' => $request->reserved_space,
            'lease_expiration' => $request->lease_expiration,
            // Actualiza aquí los demás campos en la tabla departments
        ]);
        $propertyCode = $request->input('property_code');
        return redirect()->route('property.residents', ['propertyCode' => $propertyCode])->with('success_message', 'Resident registered successfully!');
    }

    public function destroy(User $resident)
    {
        // Obtener el departamento asociado al residente
        $department = Department::where('user_id', $resident->id)->first();

        if ($department) {
            // Eliminar los vehículos asociados al departamento
            Vehicle::where('user_id', $resident->id)->delete();

            // Eliminar los registros en visitorpasses asociados al usuario
            VisitorPass::where('user_id', $resident->id)->delete();

            // Eliminar el departamento
            $department->delete();
        }

        // Eliminar al residente (usuario)
        $resident->delete();

        return redirect()->route('recidents')
            ->with('success-message', 'Resident, associated department, vehicles, and related visitor passes deleted successfully.');
    }

    public function resetPassword($userId)
    {
        $user = User::findOrFail($userId); // Get the user by their ID

        $token = Password::broker()->createToken($user);

        $user->sendPasswordResetNotification($token);

        return redirect()->route('recidents')->with('success_message', 'Reset password link sent to Resident.');

    }

    public function updateStatus(Request $request)
    {
        $residentId = $request->input('resident_id');
        $status = $request->input('status') === 'Active' ? 'Active' : 'Decline';

        $resident = User::find($residentId);

        if ($resident) {
            $resident->status = $status;
            $resident->save();

            return redirect()->back()->with('success', 'Status updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Resident not found with ID: ' . $residentId);
        }
    }

    public function updateReservedSpace(Request $request, $departmentId)
    {
        //dd($departmentId);
        $request->validate([
            'reserved_space' => 'required|numeric|min:0',
        ]);

        // Actualiza el valor en la tabla de departamentos
        $department = Department::findOrFail($departmentId);

        $department->update([
            'reserved_space' => $request->reserved_space,
        ]);
        $department = Department::findOrFail($departmentId);

        // Accede al valor de property_code desde el departamento
        $propertyCode = $department->property_code;

        // Tu lógica para actualizar el espacio reservado aquí

        return redirect()->route('property.residents', ['propertyCode' => $propertyCode])->with('success_message', 'Reserved value updated successfully.');
    }

    public function updateReservedSpaceVisitors(Request $request, $departmentId)
    {
        $request->validate([
            'reserved_spacevisitors' => 'required|numeric|min:0',
        ]);

        // Actualiza el valor en la tabla de departamentos
        $department = Department::findOrFail($departmentId);
        //dd($department);

        $department->update([
            'reserved_spacevisitors' => $request->reserved_spacevisitors,
        ]);

        $department = Department::findOrFail($departmentId);

        // Accede al valor de property_code desde el departamento
        $propertyCode = $department->property_code;

        // Tu lógica para actualizar el espacio reservado aquí

        return redirect()->route('property.residents', ['propertyCode' => $propertyCode])->with('success_message', 'Reserved value updated successfully.');
    }

    public function downloadTermsPdf($userId)
    {
        // Fetch necessary data for the PDF
        $user = User::find($userId);

        if (!$user) {
            // Handle the case when the user is not found
            return redirect()->route('otra-ruta-de-error');
        }

        // Get the associated department
        $department = Department::where('user_id', $user->id)->first();

        if (!$department) {
            // Handle the case when the department is not found
            return redirect()->route('otra-ruta-de-error');
        }

        // Prepare data for the view
        $data = [
            'user' => $user,
            'department' => $department,
        ];

        // Render the Blade view to HTML content
        $htmlContent = view('terms_pdf', $data)->render();

        // Create a new Dompdf instance
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);

        // Load HTML content into Dompdf
        $dompdf->loadHtml($htmlContent);

        // Set paper size (e.g., 'letter', 'A4', etc.)
        $dompdf->setPaper('letter', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Set the file name dynamically
        $pdfFileName = 'terms_' . $userId . '.pdf';

        // Return the PDF file for download
        return $dompdf->stream($pdfFileName);
    }

    public function addResidentvehicles($user_id)
    {
        $resident = User::where('id', $user_id)->first();

        if (!$resident) {
            return redirect()->back()->with('error', 'Resident not found.');
        }

        $propertyCode = $resident->property_code;
        $userId = $resident->user_id;

        return view('residents.addautoresident', [
            'propertyCode' => $propertyCode,
            'userId' => $userId,
        ]);
    }

    public function storeResidentVehicle(Request $request)
    {
        $validatedData = $request->validate([
            'property_code' => 'required',
            'user_id' => 'required',
            'license_plate' => 'required',
            'vin' => 'required',
            'make' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'color' => 'required',
            'vehicle_type' => 'required',
            'permit_type' => 'required',
        ]);

        // Obtener el usuario con su departamento usando un join
        $user = User::join('departments', 'users.id', '=', 'departments.user_id')
            ->where('users.id', $request->input('user_id'))
            ->select('users.*', 'departments.reserved_space as reserved_spaces')
            ->firstOrFail();

        $reservedSpaces = $user->reserved_spaces;
        //dd($reservedSpaces);

        // Contar la cantidad de vehículos registrados por el usuario
        $registeredVehiclesCount = Vehicle::where('user_id', $user->id)->count();
        //dd( $registeredVehiclesCount);
        if ($registeredVehiclesCount >= $reservedSpaces) {
            return redirect()->back()->with('error-message', 'You have reached the maximum number of registered vehicles.');
        }

        // Crear un nuevo registro de vehículo residente en la base de datos
        $vehicle = Vehicle::create($validatedData);

        // Envío del correo para estado 'pending to approve'
        Mail::send('emails.pending_approval', ['property_name' => $user->property_name], function ($message) use ($user) {
            $message->to($user->email, $user->name)
                ->subject('Pending Vehicle Approval');
        });

        return redirect()->route('recidents')->with('success-message', 'Resident vehicle added successfully.');
    }

    public function showAddVisitorForm($user_id)
    {
        $resident = User::where('id', $user_id)->first();

        if (!$resident) {
            return redirect()->back()->with('error', 'Resident not found.');
        }

        $propertyCode = $resident->property_code;
        $userId = $resident->user_id;

        return view('residents.addresidentsvisitor', [
            'propertyCode' => $propertyCode,
            'userId' => $userId,
        ]); // Asegúrate de que el nombre de la vista sea correcto
    }

    public function storeVisitor(Request $request)
    {
        // Validar los datos del formulario antes de guardarlos
        $validatedData = $request->validate([
            'property_code' => 'required',
            'visitor_name' => 'required|string',
            'visitor_phone' => 'required|string',
            'license_plate' => 'required|string',
            'year' => 'required|integer|max:' . date('Y'),
            'make' => 'required|string',
            'color' => 'required|string',
            'model' => 'required|string',
            'vehicle_type' => 'required|string',
            'valid_from' => 'required|date',
            'user_id' => 'required|exists:users,id', // Asegura que el user_id exista en la tabla users
        ]);

        // Verificar si ya hay un auto registrado con el mismo tipo y está activo
        $existingActivePass = VisitorPass::where('license_plate', $validatedData['license_plate'])
            ->where('valid_from', '>=', now()) // Check if the pass is currently active
            ->first();

        if ($existingActivePass) {
            // El vehículo ya tiene un pase activo
            return redirect()->route('recidents')->with('error', 'A visitor pass with the same license plate is already active.');
        }

        // Generar un código único de vp_code
        $vpCode = $this->generateUniqueVpCode();

        // Los datos han sido validados y verificados, puedes continuar guardándolos en la base de datos
        $visitorPass = new VisitorPass();
        $visitorPass->vp_code = $vpCode;
        $visitorPass->property_code = $validatedData['property_code'];
        $visitorPass->user_id = $validatedData['user_id'];
        $visitorPass->visitor_name = $validatedData['visitor_name'];
        $visitorPass->visitor_phone = $validatedData['visitor_phone'];
        $visitorPass->license_plate = $validatedData['license_plate'];
        $visitorPass->year = $validatedData['year'];
        $visitorPass->make = $validatedData['make'];
        $visitorPass->color = $validatedData['color'];
        $visitorPass->model = $validatedData['model'];
        $visitorPass->vehicle_type = $validatedData['vehicle_type'];
        $visitorPass->valid_from = $validatedData['valid_from'];
        $visitorPass->save();

        return redirect()->route('recidents')->with('success_message', 'Resident vehicle added successfully.');
    }

    private function generateUniqueVpCode()
    {
        $vpCode = mt_rand(10000, 99999); // Generate a random 5-digit number
        while (VisitorPass::where('vp_code', $vpCode)->exists()) {
            // If the code already exists, generate a new one
            $vpCode = mt_rand(10000, 99999);
        }
        return $vpCode;
    }

    public function showCars($residentId)
    {
        $resident = User::findOrFail($residentId);
        $cars = $resident->vehicles; // Utiliza la relación "vehicles" definida en el modelo User

        return view('residents.show_cars', compact('resident', 'cars'));
    }

    public function updateVehicle(Request $request)
    {
        $validatedData = $request->validate([
            'permit_status' => 'required|in:active,suspended',
            'vehicle_id' => 'required',
        ]);

        $vehicle = Vehicle::findOrFail($validatedData['vehicle_id']);
        $residentId = $vehicle->user_id;

        $vehicle->permit_status = $validatedData['permit_status'];

        if ($validatedData['permit_status'] === 'active') {
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date',
            ]);

            $vehicle->start_date = $request->input('start_date');
            $vehicle->end_date = $request->input('end_date');

            // Obtén el usuario con su propiedad usando un join
            $user = User::join('properties', 'users.property_code', '=', 'properties.property_code')
                ->where('users.id', $residentId)
                ->select('users.*', 'properties.name as property_name')
                ->firstOrFail();

            // Envío del correo para el estado 'active'
            Mail::send('emails.permit_active', ['property_name' => $user->property_name], function ($message) use ($user) {
                $message->to($user->email, $user->name)
                    ->subject('Your Parking Permit is Active');
            });
        } else {
            // Envío del correo para el estado 'suspended'
            $user = User::join('properties', 'users.property_code', '=', 'properties.property_code')
                ->where('users.id', $residentId)
                ->select('users.*', 'properties.name as property_name')
                ->firstOrFail();

            Mail::send('emails.permit_suspended', ['property_name' => $user->property_name], function ($message) use ($user) {
                $message->to($user->email, $user->name)
                    ->subject('Your Parking Permit has been Suspended');
            });

            // Si el estado es 'suspended', elimina las fechas
            $vehicle->start_date = null;
            $vehicle->end_date = null;
        }

        $vehicle->save();

        return redirect()->route('show_resident_cars', ['residentId' => $residentId])->with('success-message', 'Vehicle updated successfully');
    }

    public function addVehicle($vehicleId)
    {
        //dd($vehicleId);
        // Obtén el vehículo por su ID
        $vehicle = user::findOrFail($vehicleId);
        //dd($vehicle);
        // Obtén la propiedad asociada al vehículo
        // Obtén el usuario (propiedad) correspondiente al property_code del vehículo
        $property = User::where('property_code', $vehicle->property_code)->first();

        //dd($property);
        return view('residents.addvehicle', compact('vehicle', 'property'));
    }

    public function sendSuspendedEmail($vehicleId)
    {
        $vehicle = Vehicle::findOrFail($vehicleId);

        if ($vehicle->permit_status === 'suspended') {
            $user = User::find($vehicle->user_id);

            Mail::send('emails.permit_expired', ['property_name' => $user->property_name], function ($message) use ($user) {
                $message->to($user->email, $user->name)
                    ->subject('Your Parking Permit has been Suspended');
            });

            return redirect()->back()->with('success-message', 'Email sent successfully.');
        }

        return redirect()->back()->with('error-message', 'Failed to send email.');
    }

    public function editResidentVehicle($id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return redirect()->back()->with('error-message', 'Vehicle not found.');
        }

        return view('residents.editvehiclesresidents', compact('vehicle')); // Reemplaza 'vehicles.edit' con la ruta de tu vista de edición
    }

    public function updateResidentVehicle(Request $request, $id)
    {
        $validatedData = $request->validate([
            'license_plate' => 'required',
            'vin' => 'required',
            'make' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'color' => 'required',
            'vehicle_type' => 'required',
            'permit_type' => 'required',
        ]);

        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return redirect()->back()->with('error-message', 'Vehicle not found.');
        }

        // Actualizar los datos del vehículo con los valores validados
        $vehicle->update($validatedData);

        return redirect()->route('recidents')->with('success_message', 'Vehicle updated successfully.');
    }

    public function deleteResidentVehicle($id)
    {
        $vehicle = Vehicle::find($id);

        if ($vehicle) {
            $vehicle->delete();
            return redirect()->back()->with('success_message', 'Vehicle deleted successfully.');
        }

        return redirect()->back()->with('error-message', 'Vehicle not found.');
    }

}
