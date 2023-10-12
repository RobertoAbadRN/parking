<?php

namespace App\Http\Controllers;

use App\Mail\SignAgreement;
use App\Models\Department;
use App\Models\Property;
use App\Models\Registration;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VisitorPass;
use App\Models\visitorSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{

    public function registration(Request $request)
    {
        $user = User::find($request->user_id);
        $propertyCode = $user->property_code;
        $propertyID = $user->properties[0]->id;
        $registrations = Registration::where('property_id', $propertyID)
            ->where('name', 'not like', '%required%')
            ->where('name', 'not like', '%validation%')
            ->where('type', 'form')
            ->where('valor', '1')
            ->get();
        $registrations_required = Registration::where('property_id', $propertyID)
            ->where('name', 'like', '%required%')
            ->where('name', 'not like', '%validation%')
            ->where('type', 'form')
            ->where('valor', '1')
            ->get();

        $visitors = visitorSetting::where('property_id', $propertyID)
            ->where('name', 'not like', '%required%')
            ->where('name', 'not like', '%validation%')
            ->where('type', 'form')
            ->where('valor', '1')
            ->get();
        $visitors_required = visitorSetting::where('property_id', $propertyID)
            ->where('name', 'like', '%required%')
            ->where('name', 'not like', '%validation%')
            ->where('type', 'form')
            ->where('valor', '1')
            ->get();

        $fieldsRegistration = [
            //"pre_name"          => 'Residents Name',
            //"pre_email"         => 'Email',
            //"pre_phone"         => 'Phone',
            //"pre_unit"          => 'Apart/Unit ',
            //"pre_language"      => 'Language',
            "pre_license_plate" => 'License Plate ',
            "pre_vin" => 'VIN',
            "pre_make" => 'Make',
            "pre_model" => 'Model',
            "pre_year" => 'Year',
            "pre_color" => 'Color',
            "pre_vehicle_type" => 'Vehicle Type ',
            //"required_pre_name" => 'required',
            //"required_pre_email" => 'required',
            //"required_pre_phone" => 'required',
            //"required_pre_unit" => 'required',
            //"required_pre_language" => 'required',
            "required_pre_license_plate" => 'required',
            "required_pre_vin" => 'required',
            "required_pre_make" => 'required',
            "required_pre_model" => 'required',
            "required_pre_year" => 'required',
            "required_pre_color" => 'required',
            "required_pre_vehicle_type" => 'required',
            'validation_pre_license_plate' => 'unique',
        ];

        $fieldsVisitor = [
            "visitor_name" => 'Visitors Name',
            //"visitor_email" => 'Visitors Email',
            "visitor_phone" => 'Visitors Phone',
            //"visitor_language" => 'Visitors Language',
            "vin" => 'VIN',
            "license_plate" => 'License Plate',
            "year" => 'Year',
            "make" => 'Make',
            "model" => 'Model',
            "color" => 'Color',
            "vehicle_type" => 'Vehicle Type',
            //"resident_name" => ' Residents Name',
            //"resident_unit_number" => 'Residents Unit Number',
            //"resident_email" => 'Residents Email',
            //"resident_phone" => 'Residents Phone',
            //"resident_registration" => ' Residents Registration',
            "valid_from" => 'Valid From',
            "required_visitor_name" => 'required',
            //"required_visitor_email" => 'required',
            "required_visitor_phone" => 'required',
            //"required_visitor_language" => 'required',
            "required_vin" => 'required',
            "required_license_plate" => 'required',
            "required_year" => 'required',
            "required_make" => 'required',
            "required_model" => 'required',
            "required_color" => 'required',
            "required_vehicle_type" => 'required',
            //"required_resident_name" => 'required',
            //"required_resident_unit_number" => 'required',
            //"required_resident_email" => 'required',
            //"required_resident_phone" => 'required',
            //"required_resident_registration" => 'required',
            "required_valid_from" => 'required',
            //"validation_resident_name" => 'unique',
            //"validation_resident_unit_number" => 'unique',
            //"validation_resident_email" => 'unique',
            //"validation_resident_phone" => 'unique',
            //"validation_resident_registration" => 'unique'
        ];

        return view('pre-register', compact(
            'propertyCode',
            'propertyID',
            'fieldsRegistration',
            'registrations',
            'registrations_required',
            'fieldsVisitor',
            'visitors',
            'visitors_required',
        ));
    }

    public function registerVehicle(Request $request)
    {
        $user = User::find($request->user_id);
        $propertyCode = $user->property_code;
        $propertyID = $user->properties[0]->id;

        $registrations = Registration::where('property_id', $propertyID)
            ->where('name', 'not like', '%required%')
            ->where('name', 'not like', '%validation%')
            ->where('type', 'form')
            ->where('valor', '1')
            ->get();

        $data = [
            'property_code' => $propertyCode ?? null,
            'user_id' => $user->id ?? null,
            'license_plate' => $request->pre_license_plate ?? null,
            'year' => $request->pre_year ?? null,
            'color' => $request->pre_color ?? null,
            'make' => $request->pre_make ?? null,
            'model' => $request->pre_model ?? null,
            'vin' => $request->pre_vin ?? null,
            'vehicle_type' => $request->pre_vehicle_type ?? null,
            'permit_status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        //Validar los datos ingresados en el formulario
        $request->validate([
            'pre_vin' => (isset($request->required_pre_vin) && $request->required_pre_vin) ? 'required|unique:vehicles,vin' : 'nullable',
            'pre_license_plate' => (isset($request->required_pre_license_plate) && $request->required_pre_license_plate) ? 'required|unique:vehicles,license_plate' : 'nullable',
            'pre_year' => (isset($request->required_pre_year) && $request->required_pre_year) ? 'required|integer' : 'nullable',
            'pre_make' => (isset($request->required_pre_make) && $request->required_pre_make) ? 'required' : 'nullable',
            'pre_color' => (isset($request->required_pre_color) && $request->required_pre_color) ? 'required' : 'nullable',
            'pre_model' => (isset($request->required_pre_model) && $request->required_pre_model) ? 'required' : 'nullable',
            'pre_vehicle_type' => (isset($request->required_pre_vehicle_type) && $request->required_pre_vehicle_type) ? 'required' : 'nullable',
            'user_id' => (isset($request->user_id) && $request->user_id) ? 'required|exists:users,id' : 'nullable',
        ]);
        //valida si tiene espacio para mas vehiculos en la propiedad en el estacionamiento.
        if ($user->department->reserved_space <= $user->vehicles->where('property_code', $propertyCode)->count()) {
            return response()->json([
                'success' => false,
                'form' => false,
                'message' => 'You have exceeded the reserved vehicle space on the property',
            ], 200);
        }

        // Guardar en la tabla vehicles
        $vehicle = Vehicle::insert($data);

        // Realizar cualquier otra acción necesaria, como redireccionar a la vista de registro
        return $vehicle ?
        response()->json([
            'success' => true,
            'form' => $registrations,
            'message' => 'Vehicle registered successfully',
        ], 200)
        : response()->json([
            'success' => false,
            'form' => false,
            'message' => 'Vehicle not registered, try again',
        ], 200);
    }

    public function registerVisitor(Request $request)
    {
        $user = User::find($request->user_id);
        $propertyCode = $user->property_code;
        $propertyID = $user->properties[0]->id;
        $visitors = visitorSetting::where('property_id', $propertyID)
            ->where('name', 'not like', '%required%')
            ->where('name', 'not like', '%validation%')
            ->where('type', 'form')
            ->where('valor', '1')
            ->get();
        $data = [
            'property_code' => $propertyCode ?? null,
            'user_id' => $user->id ?? null,
            'visitor_name' => $request->visitor_name ?? null,
            'visitor_phone' => $request->visitor_phone ?? null,
            'license_plate' => $request->license_plate ?? null,
            'year' => $request->year ?? null,
            'color' => $request->color ?? null,
            'make' => $request->make ?? null,
            'model' => $request->model ?? null,
            'vehicle_type' => $request->vehicle_type ?? null,
            'valid_from' => Carbon::parse($request->valid_from)->format('Y-m-d H:i:s') ?? null,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        //Validar los datos ingresados en el formulario
        $request->validate([
            'visitor_name' => (isset($request->required_visitor_name) && $request->required_visitor_name) ? 'required' : 'nullable',
            'visitor_phone' => (isset($request->required_visitor_phone) && $request->required_visitor_phone) ? 'required' : 'nullable',
            'license_plate' => (isset($request->required_license_plate) && $request->required_license_plate) ? 'required' : 'nullable',
            'year' => (isset($request->required_year) && $request->required_year) ? 'required|integer' : 'nullable',
            'make' => (isset($request->required_make) && $request->required_make) ? 'required' : 'nullable',
            'color' => (isset($request->required_color) && $request->required_color) ? 'required' : 'nullable',
            'model' => (isset($request->required_model) && $request->required_model) ? 'required' : 'nullable',
            'vehicle_type' => (isset($request->required_vehicle_type) && $request->required_vehicle_type) ? 'required' : 'nullable',
            'valid_from' => (isset($request->required_valid_from) && $request->required_valid_from) ? 'required|date' : 'nullable',
            'user_id' => (isset($request->user_id) && $request->user_id) ? 'required|exists:users,id' : 'nullable',
        ]);

        //valida si tiene activo un carro en el estacionamiento  de la propiedad.
        $existingActivePass = VisitorPass::where('license_plate', $data['license_plate'])
            ->where('property_code', $data['property_code'])
            ->where('valid_from', '>=', now()) // Check if the pass is currently active
            ->first();

        if ($existingActivePass) {
            // The vehicle already has an active pass
            return response()->json([
                'success' => false,
                'form' => false,
                'message' => 'Vehicle already has an active pass',
            ], 200);
        }

        // Los datos han sido validados, puedes continuar guardándolos en la base de datos
        $visitorPass = VisitorPass::insert($data);

        return $visitorPass ?
        response()->json([
            'success' => true,
            'form' => $visitors,
            'message' => 'Visitor pass registered successfully',
        ], 200)
        : response()->json([
            'success' => false,
            'form' => false,
            'message' => 'Visitor pass not registered, try again',
        ], 200);
    }

    public function newresidet($property_code)
    {
        // Consulta la base de datos para obtener la propiedad con el property_code dado
        $property = DB::table('properties')
            ->where('property_code', $property_code)
            ->first();

        // Debugging: Output the value of $property
        //dd($property);

        // Verifica if the property exists
        if ($property !== null) {
            //dd($property->id);

            // Aquí obtén $property_name si es necesario, por ejemplo:
            $property_name = $property->name;

            return view('addnewresident', [
                'property_code' => $property_code,
                'property' => $property,
                'property_name' => $property_name,
            ]);
        }

        // If the property does not exist, load the 'error' view with a message
        return view('error', ['message' => 'The property does not exist.']);
    }

    public function store(Request $request)
    {
        //dd($request);

        // Validar los datos del formulario
        $request->validate([
            'user' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'property_code' => 'required', // Asegúrate de que el name del select sea "property_id"
            'apart_unit' => 'required|string',
            'prefered_language' => 'required|string',
        ]);
        // dd($request);
        // Crear un nuevo registro de usuario
        $user = new User();
        $user->name = $request->input('name');
        $user->user = $request->input('user');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->access_level = 'Resident';
        $user->property_code = $request->input('property_code');
        $user->banned = false;
        $user->status = 'Pending';
        $user->save(); 

        // Asignar el rol "Resident" al usuario
        $user->assignRole('Resident');

        // Crear un nuevo registro de departamento y asociarlo al usuario
        $department = new Department();
        $department->user_id = $user->id;
        $department->apart_unit = $request->input('apart_unit');
        $department->property_code = $request->input('property_code');
        $department->terms_agreement_status = 'pending';
        $department->reserved = '3';
        $department->prefered_language = $request->input('prefered_language');
        $department->save();

        // Relacionar el usuario con la propiedad en la tabla intermedia user_properties
        $property = Property::find($request->input('property_id'));
        $user->properties()->attach($property);

        // Generar y almacenar el token único
        $token = Str::random(40);
        $department->agreement_token = $token;
        $department->save();

        // Generar los enlaces para los términos y condiciones en inglés y español
        $linkEnglish = route('terms-and-conditions-english', ['token' => $token, 'language' => 'english']);
        $linkSpanish = route('terms-and-conditions-spanish', ['token' => $token, 'language' => 'spanish']);

        // Enviar un correo electrónico
        Mail::to($user->email)->send(new SignAgreement($user, $linkEnglish, $linkSpanish, $token));

        // Adjuntar un mensaje en la sesión para mostrar con SweetAlert
        Session::flash('success', 'Resident registered successfully. Please communicate this to the management.');

        // Obtener el valor de property_code
        $property_code = $request->input('property_code');
        //dd($property_code );
        // Consulta el nombre de la propiedad, por ejemplo, desde una base de datos
        $property_name = Property::where('property_code', $request->input('property_code'))->value('name');

        // Luego, pasa $property_name a la vista
        return view('addnewresident', [
            'property_code' => $request->input('property_code'),
            'property_name' => $property_name,
        ]);

    }

    public function checkEmail(Request $request, $email)
    {
        $user = User::where('email', $email)->first();

        return response()->json([
            'exists' => $user !== null,
        ]);
    }
}
