<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        return view('properties/index', compact('properties'));
    }
    public function create()
    {
        return view('properties/adduser');

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
    public function export()
    {
        return Excel::download(new PropertiesExport, 'properties.xlsx');
    }

}
