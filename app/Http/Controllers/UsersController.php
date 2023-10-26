<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\NewUserNotification;
use App\Models\EmailWelcomeManager;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    public function index()
    {
        $user = Auth::user(); // Obtén el usuario autenticado
        $residentRoleId = DB::table('roles')->where('name', 'Resident')->value('id');

        if ($user->hasRole('Company administrator')) {
            // Si el usuario tiene el rol 'Company Administrator', puede ver todos los usuarios excepto los 'Resident'
            $users = DB::table('users')
                ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->leftJoin('user_properties', 'users.id', '=', 'user_properties.user_id')
                ->leftJoin('properties', 'user_properties.property_id', '=', 'properties.id')
                ->select('users.*', DB::raw('GROUP_CONCAT(properties.name SEPARATOR " || ") as property_name'))
                ->whereNotIn('users.id', function ($query) use ($residentRoleId) {
                    $query->select('model_id')
                        ->from('model_has_roles')
                        ->where('role_id', $residentRoleId);
                })
                ->groupBy('users.id')
                ->get();

            foreach ($users as $user) {
                $roles = User::find($user->id)->getRoleNames(); // Obtener los roles del usuario
                $user->roles = $roles->implode(', '); // Convertir los roles en una cadena separada por comas
            }
        } elseif ($user->hasRole('Property manager')) {
            // Si el usuario tiene el rol 'Property Manager', obtén su property_code
            $propertyCode = $user->property_code;

            // Luego, puedes usar este property_code para filtrar la consulta de los usuarios
            $users = DB::table('users')
                ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->leftJoin('user_properties', 'users.id', '=', 'user_properties.user_id')
                ->leftJoin('properties', 'user_properties.property_id', '=', 'properties.id')
                ->select('users.*', DB::raw('GROUP_CONCAT(properties.name SEPARATOR " || ") as property_name'))
                ->where('properties.property_code', $propertyCode)
                ->whereNotIn('users.id', function ($query) use ($residentRoleId) {
                    $query->select('model_id')
                        ->from('model_has_roles')
                        ->where('role_id', $residentRoleId);
                })
                ->groupBy('users.id')
                ->get();

            foreach ($users as $user) {
                $roles = User::find($user->id)->getRoleNames(); // Obtener los roles del usuario
                $user->roles = $roles->implode(', '); // Convertir los roles en una cadena separada por comas
            }
        } else {
            // Otros casos o roles desconocidos
            abort(403, 'Acceso no autorizado');
        }

        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        $properties = Property::all();
        $roles = Role::all();

        // Define la variable $defaultPropertyCode aquí
        $defaultProperty = 'A. Martinez Towing Company LLC';

        return view('users.adduser', compact('properties', 'roles'));
    }

    public function verificarCorreo(Request $request)
    {

        $email = $request->input('email');

        // Verificar si el correo existe en la base de datos
        $user = User::where('email', $email)->first();

        if ($user) {
            // El correo existe en la base de datos
            return response()->json(['existe' => true]);
        } else {
            // El correo no existe en la base de datos
            return response()->json(['existe' => false]);
        }
    }

    public function store(Request $request)
    {

        //dd($request);
        try {
            // Validación de los datos del formulario
            $validator = Validator::make($request->all(),[
                // ... (tu validación aquí)
                'user' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'role' => 'required',
            ]);

            // Obtener el valor del campo 'role'
            // $role = $request->role;
            //dd($role);
            // Obtener el valor del campo 'role'
            $roleId = $request->role;

            // Obtener el objeto del rol
            $role = Role::findById($roleId);

            // Obtener el nombre del rol
            $roleName = $role->name;

            //dd($roleName); // Mostrará el nombre del rol
            // Si el rol es 'Company administrator' o 'Parking inspector', no validar 'properties'
            if ($roleName !== 'Company administrator' && $roleName !== 'Parking inspector') {
                $validatedData['properties'] = 'required|array';

                // Obtener los códigos de propiedad del formulario
                $propertyCodes = $request->input('properties');
                // Obtén los IDs de las propiedades basándote en los códigos de propiedad
                $propertyIds = Property::whereIn('property_code', $propertyCodes)->pluck('id')->toArray();

                // Verificar si algún código de propiedad existe en la tabla emails_welcome_manager
                $hasCustomTemplate = EmailWelcomeManager::whereIn('property_code', $propertyCodes)->exists();
            } else {
                // Si el rol es 'Company administrator' o 'Parking inspector', no verificamos propiedades
                $hasCustomTemplate = false;
            }
            // Ejecutar la validación
            $validatedData = $validator->validate();
// Obtener el correo electrónico y el usuario del formulario
            $correo = $validatedData['email'];
            $user = $validatedData['user'];

// Generar la contraseña sin encriptar
            $plainPassword = $validatedData['password'];

// Determinar la plantilla de correo a utilizar
            $emailTemplate = $hasCustomTemplate ? 'emails.new_user_notification_settings' : 'emails.new_user_notification';

// Enviar el correo al usuario
            if ($role === 'Property manager') {
                Mail::to($correo)->send(new PropertyManagerNotification(User::make($validatedData), $plainPassword, $emailTemplate));
            } else {
                Mail::to($correo)->send(new NewUserNotification(User::make($validatedData), $plainPassword, $emailTemplate));
            }

            // Encriptar la contraseña antes de asignarla al campo 'password' del modelo User
            $validatedData['password'] = bcrypt($validatedData['password']);
            // Crear el usuario en la base de datos
            $user = User::create([
                'user' => $validatedData['user'],
                'name' => $validatedData['name'],
                'phone' => $validatedData['phone'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'banned' => '1',
            ]);

            // Asignación del rol
            $user->assignRole($request->role);

            $propertyCodes = $request->input('selected_properties');
            $propertyCodesArray = explode(',', $propertyCodes);
//dd($propertyCodesArray);

            $propertyIds = Property::whereIn('property_code', $propertyCodesArray)->pluck('id')->toArray();
//dd($propertyIds);

            if (!$user) {
                throw new Exception('Error creating user');
            }

            // ... (resto de tu código)

            // Attach the properties to the user
            $user->properties()->attach($propertyIds);

            // Redireccionar a una página de éxito o mostrar un mensaje de éxito
            return redirect()->route('users')->with('success_message', 'User created successfully!');

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users')->with('error_message', 'Error creating user: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        $properties = Property::pluck('address', 'id');

        // Obteniendo los 'property_codes' desde la tabla intermedia 'user_properties'
        $userProperties = DB::table('user_properties')
            ->join('properties', 'user_properties.property_id', '=', 'properties.id')
            ->where('user_properties.user_id', '=', $id)
            ->pluck('properties.property_code')
            ->toArray();

        $userRole = DB::table('model_has_roles')->select('role_id')->where('model_id', $id)->pluck('role_id')->toArray();
        $roles = Role::all();
        if (!$user) {
            return redirect()->route('users')->with('error', 'User not found.');
        }
        //dd(compact('user', 'properties', 'userRole', 'roles', 'userProperties'));

        return view('users.edituser', compact('user', 'properties', 'userRole', 'roles', 'userProperties'));
    }

    public function update(Request $request, User $user)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'user' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            //'access_level' => 'required',
            'properties' => 'required',
            'role' => 'required',

        ]);
        //dd($validatedData);
        $user->user = $validatedData['user'];
        $user->name = $validatedData['name'];
        $user->phone = $validatedData['phone'];
        $user->email = $validatedData['email'];
        //$user->access_level = $validatedData['access_level'];
        // Obtén los IDs de las propiedades del request.
        $propertyIds = $request->input('properties');
        // Consulta la tabla de propiedades para obtener los códigos de propiedad.
        $propertyCodes = Property::whereIn('id', $propertyIds)->pluck('property_code');

        $user->save();
        $user->properties()->sync($request->properties); // Actualizar las propiedades del usuario.
        $user->syncRoles($request->role);

        return redirect()->route('users')->with('success_message', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        // Aquí puedes agregar la lógica para eliminar el usuario
        $user->delete();

        return redirect()->back()->with('success_message', 'Usuario eliminado correctamente');
    }

    public function list_users($propertyCode)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $datos = User::join('properties', 'users.property_code', '=', 'properties.property_code')
            ->where('users.property_code', $propertyCode)
            ->select('users.*', 'properties.address')
            ->distinct()
            ->get();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'User Name')
            ->setCellValue('B1', 'Name')
            ->setCellValue('C1', 'Phone')
            ->setCellValue('D1', 'Email')
            ->setCellValue('E1', 'Access Level')
            ->setCellValue('F1', 'Property ')
            ->setCellValue('G1', ' Banned')
            ->setCellValue('H1', ' Last Login Date');
        $i = 2;
        foreach ($datos as $dato) {

            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $i, $dato->user)
                ->setCellValue('B' . $i, $dato->name)
                ->setCellValue('C' . $i, $dato->phone)
                ->setCellValue('D' . $i, $dato->email)
                ->setCellValue('E' . $i, $dato->access_level)
                ->setCellValue('F' . $i, $dato->property)
                ->setCellValue('G' . $i, $dato->banned)
                ->setCellValue('H' . $i, $dato->last_login);
            $i++;
        }
        // Crea el archivo Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'list users porpety.xlsx';
        $writer->save($filename);

        // Descargar el archivo
        $response = response()->download($filename)->deleteFileAfterSend();

        // Redireccionar a la página anterior después de la descarga
        $response->headers->set('Refresh', '0;url=' . url()->previous());

        return $response;
    }

    public function excel_users()
    {

        // Create new Spreadsheet object
        // Crea una instancia de Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $datos = User::join('properties', 'users.property_code', '=', 'properties.property_code')
            ->select('users.*', 'properties.name')
            ->get();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'User Name')
            ->setCellValue('B1', 'Name')
            ->setCellValue('C1', 'Phone')
            ->setCellValue('D1', 'Email')
            ->setCellValue('E1', 'Access Level')
            ->setCellValue('F1', 'Property ')
            ->setCellValue('G1', ' Banned')
            ->setCellValue('H1', ' Last Login Date');
        $i = 2;
        foreach ($datos as $dato) {

            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $i, $dato->user)
                ->setCellValue('B' . $i, $dato->name)
                ->setCellValue('C' . $i, $dato->phone)
                ->setCellValue('D' . $i, $dato->email)
                ->setCellValue('E' . $i, $dato->access_level)
                ->setCellValue('F' . $i, $dato->property)
                ->setCellValue('G' . $i, $dato->banned)
                ->setCellValue('H' . $i, $dato->last_login);
            $i++;
        }
        // Crea el archivo Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'all users.xlsx';
        $writer->save($filename);

        // Descargar el archivo
        $response = response()->download($filename)->deleteFileAfterSend();

        // Redireccionar a la página anterior después de la descarga
        $response->headers->set('Refresh', '0;url=' . url()->previous());

        return $response;
    }

    public function resetPassword(User $user)
    {
        $token = Password::broker()->createToken($user);

        $user->sendPasswordResetNotification($token);

        return redirect()->route('users')->with('success_message', 'Reset password link sent to user.');
    }

    // Método en UsersController.php
    public function banUser(User $user)
    {
        $user->update(['banned' => 0]);
        return redirect()->route('users')->with('success_message', 'User banned successfully');
    }

    // Método en UsersController.php para alternar el estado de banned
    public function toggleBan(User $user)
    {
        // Toggles the ban status
        $user->banned = !$user->banned;
        $user->save();

        $message = $user->banned ? 'User banned successfully' : 'User unbanned successfully';

        return redirect()->route('users')->with('success_message', $message);
    }

}
