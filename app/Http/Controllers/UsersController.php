<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\NewUserNotification;
use App\Mail\UpdateUserNotification;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

     public function index()
     {
        $users = User::all(); 
 
         return view('users.index', ['users' => $users]);
     }
     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $properties = Property::all();

        return view('users.adduser', compact('properties'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'user' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email', // Added unique validation rule
            'password' => 'required',
            'access_level' => 'required',
            'property_code' => 'required',
        ]);
        //dd($validatedData);

        // Obtener el correo electrónico y el usuario del formulario
        $correo = $validatedData['email'];
        $user = $validatedData['user'];

        // Generar la contraseña sin encriptar
        $plainPassword = $validatedData['password'];

        // Enviar el correo al usuario
        Mail::to($correo)->send(new NewUserNotification(User::make($validatedData), $plainPassword));

        // Encriptar la contraseña antes de asignarla al campo 'password' del modelo User
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Crear el usuario en la base de datos
        // Crear el usuario en la base de datos y asignar el valor de 'banned' directamente
        $user = User::create([
            'user' => $validatedData['user'],
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'access_level' => $validatedData['access_level'],
            'property_code' => $validatedData['property_code'],
            'banned' => 'NO',
        ]);

        // Redireccionar a una página de éxito o mostrar un mensaje de éxito
        return redirect()->route('users')->with('success_message', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $user = User::find($id);
    $properties = Property::pluck('address', 'property_code');

    if (!$user) {
        return redirect()->route('users')->with('error', 'User not found.');
    }

    return view('users.edituser', compact('user', 'properties'));
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users')->with('error', 'User not found.');
        }

        $validatedData = $request->validate([
            'user' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8',
            'access_level' => 'required',
            'property_code' => 'required',

        ]);

        $user = User::find($id);
        $user->user = $validatedData['user'];
        $user->name = $validatedData['name'];
        $user->phone = $validatedData['phone'];
        $user->email = $validatedData['email'];
        $user->access_level = $validatedData['access_level'];
        $user->property_code = $validatedData['property_code'];
    
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }
    
        $user->save();

        return redirect()->route('users')->with('success_message', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // Aquí puedes agregar la lógica para eliminar el usuario
        $user->delete();

        return redirect()->back()->with('success_message', 'Usuario eliminado correctamente');
    }

    public function list_users($propertyCode)
    {

        // Create new Spreadsheet object
        // Crea una instancia de Spreadsheet
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
}
