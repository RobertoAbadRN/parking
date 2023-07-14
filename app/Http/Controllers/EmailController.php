<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\EmailCars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request, $id, $property_code, $email)
    {
        $html = "<h2>Tu auto ha sido remolcado </h2>";
        $correo = new EmailCars($html);
        Mail::to($email)->send($correo);

        return redirect()->route('properties.vehicles', ['property_code' => $property_code])->with('success_message', 'Mail sent successfully');
    }
}
