<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertySetting;
use App\Models\visitorSetting;
use App\Models\Registration;

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
        if(isset($request->type) && $request->type) {
            if($request->type == 'form') {
                $setting = visitorSetting::where('property_id', $request->property_id)->where('type','form')->get();
            }
            if($request->type == 'setting') {
                $setting = visitorSetting::where('property_id', $request->property_id)->where('type','setting')->get();
            }
            return $setting ?
                response()->json([
                    'success' => true,
                    'form' => $setting,
                    'message' => $request->type
                ], 200)
                : response()->json([
                    'success' => false,
                    'form' => false,
                    'message' => 'configured error, try again'
                ], 200);
        }
        if($request->action == 'form') {
            $fields = [
                "visitor_name",
                "visitor_email",
                "visitor_phone",
                "visitor_language",
                "vin",
                "license_plate",
                "year",
                "make",
                "model",
                "color",
                "vehicle_type",
                "resident_name",
                "resident_unit_number",
                "resident_email",
                "resident_phone",
                "resident_registration",
                "valid_form",
                "required_visitor_name",
                "required_visitor_email",
                "required_visitor_phone",
                "required_visitor_language",
                "required_vin",
                "required_license_plate",
                "required_year",
                "required_make",
                "required_model",
                "required_color",
                "required_vehicle_type",
                "required_resident_name",
                "required_resident_unit_number",
                "required_resident_email",
                "required_resident_phone",
                "required_resident_registration",
                "required_valid_form",
                "validation_resident_name",
                "validation_resident_unit_number",
                "validation_resident_email",
                "validation_resident_phone",
                "validation_resident_registration"
            ];
            $data = [];
            foreach ($fields as $key => $field) {
                array_push($data, [
                    'name' => $field,
                    'valor' => key_exists($field, $request->all()),
                    'type' => 'form',
                    'property_id' =>  $request->property_id
                ]);
            }
            $setting = visitorSetting::where('property_id', $request->property_id)->where('type','form')->count();
            if($setting>0) {
                visitorSetting::where('property_id', $request->property_id)->where('type','form')->delete();
                $setting = visitorSetting::insert($data);
            } else {
                $setting = visitorSetting::insert($data);
            }
        }
        if($request->action == 'setting') {
            $fields = [
                "total",
                "hours",
                "limit",
                "days",
            ];

            $data = [];
            foreach ($fields as $key => $field) {
                array_push($data, [
                    'name' => $field,
                    'valor' => key_exists($field, $request->all()) ? $request->$field : null,
                    'type' => 'setting',
                    'property_id' =>  $request->property_id
                ]);
            }

            $setting = visitorSetting::where('property_id', $request->property_id)->where('type','setting')->count();
            if($setting>0) {
                visitorSetting::where('property_id', $request->property_id)->where('type','setting')->delete();
                $setting = visitorSetting::insert($data);
            } else {
                $setting = visitorSetting::insert($data);
            }
        }


        return $setting ?
                response()->json([
                    'success' => true,
                    'form' => $setting,
                    'message' => 'configured successfully'
                ], 200)
                : response()->json([
                    'success' => false,
                    'form' => false,
                    'message' => 'configured not set, try again'
                ], 200);
    }

    public function registrationSettingStore(Request $request)
    {
        if(isset($request->type) && $request->type) {
            if($request->type == 'form') {
                $setting = Registration::where('property_id', $request->property_id)->where('type','form')->get();
            }
            return $setting ?
                response()->json([
                    'success' => true,
                    'form' => $setting,
                    'message' => $request->type
                ], 200)
                : response()->json([
                    'success' => false,
                    'form' => false,
                    'message' => 'configured error, try again'
                ], 200);
        }
        $fields = [
            "pre_name",
            "pre_email",
            "pre_phone",
            "pre_unit",
            "pre_language",
            "pre_license_plate",
            "pre_vin",
            "pre_make",
            "pre_model",
            "pre_year",
            "pre_color",
            "pre_vehicle_type",
            "required_name",
            "required_email",
            "required_phone",
            "required_unit",
            "required_language",
            "required_license_plate",
            "required_vin",
            "required_make",
            "required_model",
            "required_year",
            "required_color",
            "required_vehicle_type",
            "validation_license_plate"
        ];


        $data = [];
        foreach ($fields as $key => $field) {
            array_push($data, [
                'name' => $field,
                'valor' => key_exists($field, $request->all()),
                'type' => 'form',
                'property_id' =>  $request->property_id
            ]);
        }
        $setting = Registration::where('property_id', $request->property_id)->where('type','form')->count();
        if($setting>0) {
            Registration::where('property_id', $request->property_id)->where('type','form')->delete();
            $setting = Registration::insert($data);
        } else {
            $setting = Registration::insert($data);
        }


        return $setting ?
                response()->json([
                    'success' => true,
                    'form' => $setting,
                    'message' => 'configured successfully'
                ], 200)
                : response()->json([
                    'success' => false,
                    'form' => false,
                    'message' => 'configured not set, try again'
                ], 200);
    }

    public function registration($property)
    {
        return view('settingss/registration', ['property' => Property::find($property)] );
    }
}
