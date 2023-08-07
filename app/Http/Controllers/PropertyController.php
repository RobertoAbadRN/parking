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
         // Obtén todas las propiedades y calcula el total de autos por cada una usando LEFT JOIN y subconsulta
         $properties = Property::select('properties.id', 'properties.name', 'properties.nickname', 'properties.permit_status', 'properties.area', 'properties.address', 'properties.property_code')
             ->distinct() // Agregar el método distinct() para eliminar duplicados
             ->leftJoin('vehicles', 'properties.property_code', '=', 'vehicles.property_code')
             ->selectSub(function ($query) {
                 $query->from('vehicles')
                     ->whereColumn('properties.property_code', '=', 'vehicles.property_code')
                     ->selectRaw('count(*)');
             }, 'total_cars')
             ->get();
     
         // Devuelve la vista 'properties.index' y pasa los datos de los registros como variable "properties"
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
            'nickName' => 'required',
        ]);

        // Generate the property code
        $propertyCode = $this->generateUniquePropertyCode();

        // Crear una nueva instancia del modelo y asignar los datos validados
        $property = new Property();
        $property->area = $request->input('area');
        $property->name = $request->input('name');
        $property->address = $request->input('address');
        $property->city = $request->input('city');
        $property->state = $request->input('state');
        $property->country = $request->input('country');
        $property->zip_code = $request->input('zip_code');
        $property->location_type = $request->input('location_type');
        $property->places = $request->input('places');
        $property->nickName = $request->input('nickName');

        // Agregar el valor 'active' al campo permit_status
        $property->permit_status = 'active';

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
        return redirect()->route('properties')->with('success_message', 'The data has been updated successfully');
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
            'nickname' => 'required', // Agregar la regla de validación para el campo nickName
        ]);

        // Actualizar los atributos de la propiedad con los nuevos valores, incluyendo el campo nickname
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
            $property->logo = $logoPath;
            $property->save();
        }

        // Redireccionar a los detalles de la propiedad actualizada
        return redirect()->route('properties')->with('success_message', 'The data has been updated successfully');
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
<<<<<<< HEAD
{
    $vehicles = Vehicle::join('users', 'users.id', '=', 'vehicles.user_id')
        ->join('departaments', 'departaments.user_id', '=', 'users.id')
        ->select('vehicles.*', 'users.name', 'users.email', 'users.phone', 'departaments.apart_unit', 'departaments.reserved_space')
        ->where('vehicles.property_code', $property_code)
        ->groupBy('vehicles.id')
        ->get();

    $property = Property::where('property_code', $property_code)->select('name as property_name')->first();
    $property_name = $property ? $property->property_name : '';

    return view('vehicles.listvehicles', compact('vehicles', 'property_code', 'property_name'));
}


=======
    {
        $vehicles = Vehicle::join('users', 'users.id', '=', 'vehicles.user_id')
            ->join('departments', 'departments.user_id', '=', 'users.id')
            ->select('vehicles.*', 'users.name as resident_name', 'users.email', 'users.phone', 'departments.apart_unit', 'departments.reserved_space')
            ->where('vehicles.property_code', $property_code)
            ->groupBy('vehicles.id')
            ->get();

        // Obtener el atributo 'address' de la propiedad
        $property = Property::where('property_code', $property_code)->select('name as property_name', 'address')->first();

        $property_name = $property ? $property->property_name : '';
        $property_address = $property ? $property->address : '';

        return view('vehicles.listvehicles', compact('vehicles', 'property_code', 'property_name', 'property_address'));
    }
>>>>>>> jgle-feature-roles-permisos

    public function users($propertyCode)
    {

        $users = User::join('properties', 'users.property_code', '=', 'properties.property_code')

            ->where('users.property_code', $propertyCode)

            ->select('users.*', 'properties.address')

            ->distinct()

            ->get();

        return view('properties.users', compact('users'));

    }

    public function updatePermitStatus(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        $permitStatus = $request->input('permit_status');
        if ($permitStatus === 'active') {
            $property->permit_status = 'active';
        } else {
            $property->permit_status = 'inactive';
        }

        $property->save();

        return redirect()->back(); // Redirige al usuario a la vista anterior después de actualizar el estado del permiso
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

    public function searchResidents(Request $request)
    {
        $searchQuery = $request->input('q');

        $residents = User::where('access_level', 'Resident')
            ->where('name', 'LIKE', '%' . $searchQuery . '%')
            ->get(['id', 'name']);

        return response()->json($residents);
    }

}
