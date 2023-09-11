<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ActivateEmail;
use App\Mail\EmailCars;
use App\Mail\ExpiredEmail; // Make sure to import the MassEmail class
use App\Mail\MassEmail;
use App\Mail\SuspendEmail;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\EmailSetting;
use App\Models\DefaultEmailSetting;


// Import the Resident model

class EmailController extends Controller
{

    public function sendEmail(Request $request, $id, $property_code, $email)
    {

        $html = "<h2>Tu auto ha sido remolcado </h2>";

        $correo = new EmailCars($html);

        Mail::to($email)->send($correo);

        return redirect()->route('properties.vehicles', ['property_code' => $property_code])->with('success_message', 'Mail sent successfully');

    }

    public function sendMassEmail(Request $request)
    {
        $selectedResidents = $request->input('selectedResidents', []);

        // Obtener detalles de los residentes seleccionados
        $residents = User::whereIn('id', $selectedResidents)->get();

        // Envío de correos
        foreach ($residents as $resident) {
            Mail::to($resident->email)->send(new MassEmail($resident));
        }

        return response()->json(['message' => 'Emails sent successfully.']);
    }

    public function sendExpiredEmail(Request $request, $id)
    {

        $resident = User::findOrFail($id);

        // Asegúrate de que el usuario relacionado esté correctamente cargado

        if ($resident) {
            // Envía el correo utilizando el Mailable y pasa 'property_name' al arreglo de datos
            Mail::send('emails.permit_expired', ['property_name' => $resident->property_name], function ($message) use ($resident) {
                $message->to($resident->email, $resident->name)
                    ->subject('Your Parking Permit has Expired');
            });

            // Redirige de nuevo con un mensaje de éxito
            return redirect()->back()->with('success_message', 'Expired email sent successfully.');
        } else {
            // Manejar el caso donde $user es null
            return redirect()->back()->with('error-message', 'Failed to send email: User not found.');
        }
    }
    public function sendActivateEmail($id)
    {
        $resident = User::findOrFail($id);

        if ($resident) {
            Mail::to($resident->email, $resident->name)
                ->send(new ActivateEmail());

            return redirect()->back()->with('success_message', 'Activation email sent successfully.');
        } else {
            return redirect()->back()->with('error-message', 'Failed to send email: Resident not found.');
        }
    }

    public function sendSuspendEmail($id)
{
    $resident = User::findOrFail($id);

    if ($resident) {
        Mail::to($resident->email, $resident->name)
            ->send(new SuspendEmail($resident)); // Asegúrate de pasar $resident como argumento

        // Realiza la lógica para suspender al residente aquí
        // Por ejemplo, puedes cambiar el estado del residente a suspendido en la base de datos

        return redirect()->back()->with('success_message', 'Suspension email sent successfully.');
    } else {
        return redirect()->back()->with('error-message', 'Failed to send suspension email: Resident not found.');
    }
}

public function edit(Request $request, $property_code)
{
    // Intenta obtener la propiedad por su código
    $property = Property::where('property_code', $property_code)->first();

    // Si no se encuentra la propiedad, redirige o maneja el error según tus necesidades
    if (!$property) {
        // Manejar el caso cuando no se encuentra la propiedad
        return redirect()->route('pagina_de_error')->with('error', 'La propiedad no existe.');
    }

    // Ahora, intenta obtener la configuración de correo electrónico para la propiedad
    $emailSetting = EmailSetting::where('property_code', $property_code)->first();

    // Si no se encuentra la configuración en la tabla `emails_settings`, intenta obtener los valores predeterminados
    if (!$emailSetting) {
        $defaultEmailSetting = DefaultEmailSetting::first();
     

        // Pasa los datos a la vista, dependiendo de si se encontró o no la configuración
        return view('settingss.emails', [
            'property' => $property, // Pasamos la propiedad a la vista
            'emailSetting' => $defaultEmailSetting ?? null,
        ]);
    }

    // Si se encontró la configuración en la tabla `emails_settings`, pasa los datos a la vista
    return view('settingss.emails', compact('property', 'emailSetting'));
}

public function update(Request $request)
{
    // Validar los datos del formulario si es necesario
    $request->validate([
        'email_content' => 'required',
    ]);

    // Obtener la configuración de correo electrónico existente
    $emailSetting = EmailSetting::where('property_code', auth()->user()->property_code)->first();

    // Verificar si $emailSetting es nulo
    if ($emailSetting === null) {
        // Si es nulo, crea una nueva instancia de EmailSetting
        $emailSetting = new EmailSetting();
        // Asigna el código de propiedad del usuario autenticado
        $emailSetting->property_code = auth()->user()->property_code;
    }

    // Actualizar la configuración de correo electrónico
    $emailSetting->email_content = $request->input('email_content');
    $emailSetting->save();

    // Redirigir de vuelta con un mensaje de éxito
    return redirect()->route('email.edit', ['property_code' => $emailSetting->property_code])->with('success_message', 'Configuración de correo electrónico actualizada correctamente.');

}



}
