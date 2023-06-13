<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::select('properties.*', DB::raw('(SELECT COUNT(*) FROM vehicles WHERE vehicles.property_code = properties.property_code) AS vehicle_count'), DB::raw('COUNT(users.id) AS user_count'))
    ->leftJoin('users', 'properties.property_code', '=', 'users.property_code')
    ->groupBy('properties.property_code')
    ->get();

    //dd($properties);
        return view('properties/index', compact('properties'));
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
            // Store the logo file and get its path
            $logoPath = $logo->store('public/logos');
            // Set the logo path on the property instance
            $property->logo = $logoPath;
        }

        // Guardar el modelo en la base de datos
        $property->save();

        // Redireccionar a una página de éxito o mostrar un mensaje de éxito
        $request->session()->flash('css', 'success');
        $request->session()->flash('message', "The record has been created successfully");
        return redirect()->route('properties');

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

        $datos = Property::orderBy('id', 'desc')->get();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Area')
            ->setCellValue('B1', 'Property Name')
            ->setCellValue('C1', 'Address')
            ->setCellValue('D1', 'City')
            ->setCellValue('E1', 'State')
            ->setCellValue('F1', 'Property Code')
            ->setCellValue('G1', ' Type');
        $i = 2;
        foreach ($datos as $dato) {

            $spreadsheet->getActiveSheet()
                ->setCellValue('A' . $i, $dato->name)
                ->setCellValue('B' . $i, $dato->address)
                ->setCellValue('C' . $i, $dato->city)
                ->setCellValue('D' . $i, $dato->state)
                ->setCellValue('E' . $i, $dato->property_code)
                ->setCellValue('F' . $i, $dato->location_type)
                ->setCellValue('G' . $i, $dato->places);
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
        $vehicles = Vehicle::join('properties', 'properties.property_code', '=', 'vehicles.property_code')
            ->select('vehicles.resident_name', 'vehicles.apart_unit', 'vehicles.preferred_language', 'vehicles.license_plate', 'vehicles.make', 'vehicles.model', 'properties.*')
            ->where('vehicles.property_code', $property_code)
            ->get();
        return view('vehicles/listvehicles', compact('vehicles'));
    }
    public function users($propertyCode)
    {
        $users = User::where('property_code', $propertyCode)->get();
        return view('properties.users', compact('users'));
    }
}
