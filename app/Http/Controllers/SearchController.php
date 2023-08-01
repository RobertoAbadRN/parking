<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Redirect;


class SearchController extends Controller
{    

    public function validatePropertyCode(Request $request)
    {
        $input = $request->input('property_code');
    
        $property = Property::where('property_code', $input)
            ->orWhere('address', $input)
            ->first();
    
        if ($property) {
            return redirect()->route('visitors.addvisitors', ['property_code' => $property->property_code]);
        } else {
            return redirect()->route('login')->withInput()->with('error', 'Property not found!');
        }
    }   
    

}
