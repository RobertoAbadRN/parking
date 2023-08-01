<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertySetting;
use App\Models\visitorSetting;

class SettingsController extends Controller
{
    public function index()
    {
        $properties = Property::all(); // Obtener todos los registros de la tabla "properties"

        foreach ($properties as $property) {
            $address = $property->address; // Acceder al campo "address" de cada registro
            // Hacer lo que necesites con la dirección
            // ...
        }
        return view('settingss/index', ['properties' => $properties] );
    }

    public function language(Request $request)
    {
        $propertySetting = PropertySetting::where('property_id', $request->property)->first();

        return response()->json([
            'success' => true,
            'propertySetting' => $propertySetting
        ], 200);

    }

    public function store(Request $request)
    {
        $settingLanguage = PropertySetting::where('property_id', $request->property_id)->first();
        $settingLanguage = $settingLanguage ? $settingLanguage->update($request->except(['_token'])) : PropertySetting::create($request->except(['_token']));
        return $settingLanguage ?
                response()->json([
                    'success' => true,
                    'message' => 'language configured successfully'
                ], 200)
                : response()->json([
                    'success' => false,
                    'message' => 'language not set, try again'
                ], 200);
    }

    public function permit($property)
    {
        //PropertySetting::where('property_id', $property)->first();
        return view('settingss/permit', ['property' => Property::find($property)]);
    }

    public function permit_type($property)
    {
        return view('settingss/permit_type', ['property' => Property::find($property)] );
    }

    public function visitor($property)
    {
        return view('settingss/visitor', ['property' => Property::find($property)] );
    }

    public function visitorSettingStore(Request $request)
    {
       /* [
  "_token" => "z6J2umh58IVrVFk5Lc1b0PcuBBzsDc4syXYHFSiV"
  "visitor_name" => "on"
  "visitor_email" => "on"
  "visitor_phone" => "on"
  "visitor_language" => "on"
  "vin" => "on"
  "license_plate" => "on"
  "year" => "on"
  "make" => "on"
  "model" => "on"
  "color" => "on"
  "vehicle_type" => "on"
  "resident_name" => "on"
  "resident_unit_number" => "on"
  "resident_email" => "on"
  "resident_phone" => "on"
  "resident_registration" => "on"
  "valid_form" => "on"
  "required_visitor_name" => "on"
  "required_visitor_email" => "on"
  "required_visitor_phone" => "on"
  "required_visitor_language" => "on"
  "required_vin" => "on"
  "required_license_plate" => "on"
  "required_year" => "on"
  "required_make" => "on"
  "required_model" => "on"
  "required_color" => "on"
  "required_vehicle_type" => "on"
  "required_resident_name" => "on"
  "required_resident_unit_number" => "on"
  "required_resident_email" => "on"
  "required_resident_phone" => "on"
  "required_resident_registration" => "on"
  "required_valid_form" => "on"
  "validation_resident_name" => "on"
  "validation_resident_unit_number" => "on"
  "validation_resident_email" => "on"
  "validation_resident_phone" => "on"
  "validation_resident_registration" => "on"
]*/

$data = [];
foreach ($request->except(['_token']) as $key => $value) {
    $field_required = 'required_'.$key;
    $field_validation_ = 'validation_'.$key;
    if($key != 'property_id') {
        array_push($data, [
            'field' =>  $key,
            'value_field' => $value,
            'required' => $field_required,
            'value_required' => $value,
            'validation' => $field_validation_,
            'property_id' => $request->property_id
        ]);
    }
}

/*foreach ($data as $key => $value) {
    print_r( $request[$value['field']]);
    //$value['field'] == $request->
}*/

dd($data);
        /*$data = [
            [
                'field' => 'yytyty',
                'required' => 1,
                'validation' => 1,
                'property_id' => 6
            ],
            [
                'field' => 'test',
                'required' => 1,
                'validation' => 0,
                'property_id' => 6
            ]
        ];
        $visitor_email = $request->visitor_email == 'on' ? 'visitor_email' : null;
        $visitor_email_active = $visitor_email ? true : false;
        //$test = visitorSetting::insert($data);
        dd($visitor_email);*/
    }

    public function registration($property)
    {
        return view('settingss/registration', ['property' => Property::find($property)] );
    }
}
