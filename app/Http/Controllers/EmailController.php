<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ActivateEmail;
use App\Mail\EmailCars;
use App\Mail\ExpiredEmail; // Make sure to import the MassEmail class
use App\Mail\MassEmail;
use App\Mail\SuspendEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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


}
