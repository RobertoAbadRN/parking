<?php



namespace App\Http\Controllers;



use App\Http\Controllers\Controller;

use App\Models\Property;

use App\Models\User;

use App\Models\Vehicle;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



class PropertyController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $properties = Property::select('*', DB::raw('(SELECT COUNT(*) FROM users WHERE users.property_code = properties.property_code) AS total_users'), DB::raw('(SELECT COUNT(*) FROM vehicles WHERE vehicles.property_code = properties.property_code) AS total_cars'))

            ->get();



        return view('properties.index', compact('properties'));

    }



    public function create()

    {

        return view('properties/addproperty');



    }

    public function storeProperty(Request $request)

    {

        // Validar los datos del formulario

        $validatedData = $request->validate([

            'area' => 'required',

            'name' => 'required',

            'address' => 'required',

            'city' => 'required',

            'state' => 'required',

            'country' => 'required',

            'zip_code' => 'required',

            'location_type' => 'required',

            'places' => 'required',

            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the max file size as needed

        ]);

        // Generate the property code

        $propertyCode = $this->generateUniquePropertyCode();

        // Crear una nueva instancia del modelo y asignar los datos validados

        $property = new Property();

        $property->area = $validatedData['area'];

        $property->name = $validatedData['name'];

        $property->address = $validatedData['address'];

        $property->city = $validatedData['city'];

        $property->state = $validatedData['state'];

        $property->country = $validatedData['country'];

        $property->zip_code = $validatedData['zip_code'];

        $property->location_type = $validatedData['location_type'];

        $property->places = $validatedData['places'];



        // Handle the logo file if it was uploaded

        if ($request->hasFile('logo')) {

            $logo = $request->file('logo');

            $filename = time() . '.' . $logo->getClientOriginalExtension();

            Storage::disk('public')->put($filename, File::get($logo));

            // Guarda el nombre del archivo en la base de datos

            $property->logo = $filename;

        }



        // Guardar el modelo en la base de datos

        $property->save();



        // Redireccionar a una página de éxito o mostrar un mensaje de éxito

        // Redireccionar a los detalles de la propiedad actualizada

        return redirect()->route('properties')->with('success_message', 'The data has been updated successfully ');



    }

    private function generateUniquePropertyCode()

    {

        $propertyCode = Str::random(5);



        // Check if the generated code already exists

        while (Property::where('property_code', $propertyCode)->exists()) {

            $propertyCode = Str::random(5);

        }



        return $propertyCode;

    }



    public function edit(Property $property)

    {

        // Mostrar el formulario de edición de una propiedad específica

        return view('properties.edit', compact('property'));

    }

    public function update(Request $request, Property $property)

    {

        // Validar los datos del formulario

        $validatedData = $request->validate([

            'area' => 'required',

            'name' => 'required',

            'address' => 'required',

            'city' => 'required',

            'state' => 'required',

            'country' => 'required',

            'zip_code' => 'required',

            'location_type' => 'required',

            'places' => 'required',

            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Valida que el campo 'logo' sea una imagen válida (opcional)

        ]);



        // Actualizar los atributos de la propiedad con los nuevos valores

        $property->update($validatedData);



        // Manejar la carga de un nuevo logotipo, si se proporciona

        if ($request->hasFile('logo')) {

            // Eliminar el logotipo anterior, si existe

            if ($property->logo) {

                Storage::delete($property->logo);

            }



            // Subir y guardar el nuevo logotipo

            $logoPath = $request->file('logo')->store('logos');



            // Actualizar el atributo "logo" de la propiedad con la ruta del nuevo logotipo

            $property->update(['logo' => $logoPath]);

        }



        // Redireccionar a los detalles de la propiedad actualizada

        return redirect()->route('properties')->with('success_message', 'The data has been updated successfully ');



    }

    public function destroy($id)

    {

        // Obtener la propiedad a eliminar

        $property = Property::findOrFail($id);



        // Eliminar la propiedad

        $property->delete();



        // Redireccionar o devolver una respuesta según tu lógica

        return redirect()->route('properties')->with('success_message', 'Property deleted successfully');

    }



    public function utiles_excel()

    {



        // Create new Spreadsheet object

        // Crea una instancia de Spreadsheet

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $datos = Property::select('properties.*', DB::raw('(SELECT COUNT(*) FROM vehicles WHERE vehicles.property_code = properties.property_code) AS vehicle_count'), DB::raw('COUNT(users.id) AS user_count'))

            ->leftJoin('users', 'properties.property_code', '=', 'users.property_code')

            ->groupBy('properties.property_code')

            ->get();

        $spreadsheet->setActiveSheetIndex(0)

            ->setCellValue('A1', 'Area')

            ->setCellValue('B1', 'Property Name')

            ->setCellValue('C1', 'Address')

            ->setCellValue('D1', 'City')

            ->setCellValue('E1', 'State')

            ->setCellValue('F1', 'Property Code')

            ->setCellValue('G1', ' Type')

            ->setCellValue('H1', ' Places')

            ->setCellValue('I1', ' Vehicles')

            ->setCellValue('J1', ' Users');

        $i = 2;

        foreach ($datos as $dato) {



            $spreadsheet->getActiveSheet()

                ->setCellValue('A' . $i, $dato->area)

                ->setCellValue('B' . $i, $dato->name)

                ->setCellValue('C' . $i, $dato->address)

                ->setCellValue('D' . $i, $dato->city)

                ->setCellValue('E' . $i, $dato->state)

                ->setCellValue('F' . $i, $dato->property_code)

                ->setCellValue('G' . $i, $dato->location_type)

                ->setCellValue('H' . $i, $dato->places)

                ->setCellValue('I' . $i, $dato->vehicle_countt)

                ->setCellValue('J' . $i, $dato->user_count);

            $i++;

        }

        // Crea el archivo Excel

        $writer = new Xlsx($spreadsheet);

        $filename = 'Property.xlsx';

        $writer->save($filename);



        // Descargar el archivo

        $response = response()->download($filename)->deleteFileAfterSend();



        // Redireccionar a la página anterior después de la descarga

        $response->headers->set('Refresh', '0;url=' . url()->previous());



        return $response;

    }





    public function vehicles($property_code)

{

    $vehicles = Vehicle::join('users', 'users.id', '=', 'vehicles.user_id')

        ->join('departments', 'departments.user_id', '=', 'users.id')

        ->select('vehicles.*', 'users.name', 'users.email', 'users.phone', 'departments.apart_unit', 'departments.reserved_space')

        ->where('vehicles.property_code', $property_code)

        ->groupBy('vehicles.id')

        ->get();

        

    $property = Property::where('property_code', $property_code)->select('name as property_name')->first();

    $property_name = $property ? $property->property_name : '';



    return view('vehicles.listvehicles', compact('vehicles', 'property_code', 'property_name'));

}







    public function users($propertyCode)

    {

        $users = User::join('properties', 'users.property_code', '=', 'properties.property_code')

            ->where('users.property_code', $propertyCode)

            ->select('users.*', 'properties.address')

            ->distinct()

            ->get();



        return view('properties.users', compact('users'));

    }



    public function updatePermitStatus(Request $request, Property $property)

    {

        $permitStatus = $request->input('permitStatus');



        $property->permit_status = $permitStatus;

        $property->save();



        return response()->json([

            'success_message' => 'Permit status updated successfully',

            'permitStatus' => $property->permit_status,

        ]);

    }



    public function adduser(Request $request)

    {

        $property_code = $request->property_code;



        $address = Property::where('property_code', $property_code)

            ->pluck('address')

            ->first();



        // Resto del código del controlador



        return view('properties.formadduser', compact('property_code', 'address'));

    }



}

