<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ActivateEmail;
use App\Mail\EmailCars;
use App\Mail\ExpiredEmail; // Make sure to import the MassEmail class
use App\Mail\SuspendEmail;
use App\Models\DefaultEmailApprove;
use App\Models\DefaultEmailExpired;
use App\Models\DefaultEmailRegisterVehicle;
use App\Models\DefaultEmailSetting;
use App\Models\DefaultEmailSuspend;
use App\Models\DefaultEmailWelcome;
use App\Models\DefaultEmailWelcomeManage;
use App\Models\EmailAproved;
use App\Models\EmailExpired;
use App\Models\EmailRegisterVehicle;
use App\Models\EmailSetting;
use App\Models\EmailSuspend;
use App\Models\EmailWelcome;
use App\Models\EmailWelcomeManager;
use App\Models\Property;
use App\Models\User;
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

    public function sendMassEmail(Request $request)
    {
        $selectedResidents = $request->input('selectedResidents', []);
        $propertyCode = $request->input('propertyCode');

        // Verificar si existe una configuración de correo para el property_code
        $emailSetting = EmailSetting::where('property_code', $propertyCode)->first();

        // Si no se encuentra una configuración, usa la vista por defecto
        $view = $emailSetting ? 'emails.massdinamic' : 'emails.mass';

        // Obtener detalles de los residentes seleccionados
        $residents = User::whereIn('id', $selectedResidents)->get();

        // Iterar sobre los residentes y enviar correos
        foreach ($residents as $resident) {
            // Enviar el correo utilizando Mail::send
            Mail::send($view, ['resident' => $resident, 'emailSetting' => $emailSetting], function ($message) use ($resident) {
                $message->to($resident->email)->subject('Asunto de tu correo aquí');
            });
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

            // Determina cuál es el tab activo actualmente (por ejemplo, a través de un parámetro en la URL o algún otro método)
            $activeTab = $request->query('active_tab', 1);

            // Pasa los datos a la vista, dependiendo de si se encontró o no la configuración y cuál es el tab activo
            return view('settingss.emails', [
                'property' => $property, // Pasamos la propiedad a la vista
                'emailSetting' => $defaultEmailSetting ?? null,
                'property_code' => $property_code,
                'activeTab' => $activeTab, // Pasamos el tab activo a la vista
            ]);
        }

        // Si se encontró la configuración en la tabla `emails_settings`, pasa los datos a la vista
        return view('settingss.emails', compact('property', 'emailSetting', 'property_code'));
    }

    public function update(Request $request)
    {
        // Validar los datos del formulario si es necesario
        $request->validate([
            'email_content' => 'required',
            'property_code' => 'required', // Agrega una validación para property_code
        ]);

        // Obtener el property_code del formulario
        $property_code = $request->input('property_code');

        // Buscar la configuración de correo electrónico existente por property_code
        $emailSetting = EmailSetting::where('property_code', $property_code)->first();

        // Si no se encuentra la configuración, crea una nueva instancia
        if (!$emailSetting) {
            $emailSetting = new EmailSetting();
            $emailSetting->property_code = $property_code;
        }

        // Actualizar la configuración de correo electrónico
        $emailSetting->email_content = $request->input('email_content');
        $emailSetting->save();

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->route('email.edit', ['property_code' => $property_code])->with('success_message', 'Configuración de correo electrónico actualizada correctamente.');
    }

    public function approveVehicle(Request $request, $property_code)
    {
        // Intenta obtener la propiedad por su código
        $property = Property::where('property_code', $property_code)->first();

        // Si no se encuentra la propiedad, redirige o maneja el error según tus necesidades
        if (!$property) {
            // Manejar el caso cuando no se encuentra la propiedad
            return redirect()->route('pagina_de_error')->with('error', 'La propiedad no existe.');
        }

        // Ahora, intenta obtener la configuración de correo electrónico para la propiedad
        $emailSetting = EmailAproved::where('property_code', $property_code)->first();
        //dd($emailSetting);
        // Si no se encuentra la configuración en la tabla `emails_settings`, intenta obtener los valores predeterminados
        if (!$emailSetting) {
            $defaultEmailSetting = DefaultEmailApprove::first();
            //dd($defaultEmailSetting);
            // Pasa los datos a la vista, dependiendo de si se encontró o no la configuración y cuál es el tab activo
            return view('settingss.emailsapprove', [
                'property' => $property, // Pasamos la propiedad a la vista
                'emailSetting' => $defaultEmailSetting ?? null,
                'property_code' => $property_code,
            ]);
        }

        // Si se encontró la configuración en la tabla `emails_settings`, pasa los datos a la vista
        return view('settingss.emailsapprove', compact('property', 'emailSetting', 'property_code'));
    }

    public function updateapprove(Request $request)
    {
        // Validar los datos del formulario si es necesario
        $request->validate([
            'email_content' => 'required',
            'property_code' => 'required', // Agrega una validación para property_code
        ]);

        // Obtener el property_code del formulario
        $property_code = $request->input('property_code');

        // Buscar la configuración de correo electrónico existente por property_code
        $emailSetting = EmailAproved::where('property_code', $property_code)->first();

        // Si no se encuentra la configuración, crea una nueva instancia
        if (!$emailSetting) {
            $emailSetting = new EmailAproved();
            $emailSetting->property_code = $property_code;
        }

        // Actualizar la configuración de correo electrónico
        $emailSetting->email_content = $request->input('email_content');
        $emailSetting->save();

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->route('obtener-email-approve', ['property_code' => $property_code])->with('success_message', 'Configuración de correo electrónico actualizada correctamente.');
    }

    public function suspendEmail($property_code)
    {
        // Intenta obtener la propiedad por su código
        $property = Property::where('property_code', $property_code)->first();

        // Si no se encuentra la propiedad, redirige o maneja el error según tus necesidades
        if (!$property) {
            // Manejar el caso cuando no se encuentra la propiedad
            return redirect()->route('pagina_de_error')->with('error', 'La propiedad no existe.');
        }

        // Ahora, intenta obtener la configuración de correo electrónico para la propiedad
        $emailSetting = EmailSuspend::where('property_code', $property_code)->first();
        //dd($emailSetting);
        // Si no se encuentra la configuración en la tabla `emails_settings`, intenta obtener los valores predeterminados
        if (!$emailSetting) {
            $defaultEmailSetting = DefaultEmailSuspend::first();
            //dd($defaultEmailSetting);
            // Pasa los datos a la vista, dependiendo de si se encontró o no la configuración y cuál es el tab activo
            return view('settingss.emailsuspended', [
                'property' => $property, // Pasamos la propiedad a la vista
                'emailSetting' => $defaultEmailSetting ?? null,
                'property_code' => $property_code,
            ]);
        }

        // Si se encontró la configuración en la tabla `emails_settings`, pasa los datos a la vista
        return view('settingss.emailsuspended', compact('property', 'emailSetting', 'property_code'));
    }

    public function updatesuspendEmail(Request $request)
    {
        // Validar los datos del formulario si es necesario
        $request->validate([
            'email_content' => 'required',
            'property_code' => 'required', // Agrega una validación para property_code
        ]);

        // Obtener el property_code del formulario
        $property_code = $request->input('property_code');

        // Buscar la configuración de correo electrónico existente por property_code
        $emailSetting = EmailSuspend::where('property_code', $property_code)->first();

        // Si no se encuentra la configuración, crea una nueva instancia
        if (!$emailSetting) {
            $emailSetting = new EmailSuspend();
            $emailSetting->property_code = $property_code;
        }

        // Actualizar la configuración de correo electrónico
        $emailSetting->email_content = $request->input('email_content');
        $emailSetting->save();

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->route('obtener-email-suspend', ['property_code' => $property_code])->with('success_message', 'Configuración de correo electrónico actualizada correctamente.');
    }

    public function registerEmail($property_code)
    {
        // Intenta obtener la propiedad por su código
        $property = Property::where('property_code', $property_code)->first();

        // Si no se encuentra la propiedad, redirige o maneja el error según tus necesidades
        if (!$property) {
            // Manejar el caso cuando no se encuentra la propiedad
            return redirect()->route('pagina_de_error')->with('error', 'La propiedad no existe.');
        }

        // Ahora, intenta obtener la configuración de correo electrónico para la propiedad
        $emailSetting = EmailRegisterVehicle::where('property_code', $property_code)->first();
        //dd($emailSetting);
        // Si no se encuentra la configuración en la tabla `emails_settings`, intenta obtener los valores predeterminados
        if (!$emailSetting) {
            $defaultEmailSetting = DefaultEmailRegisterVehicle::first();
            //dd($defaultEmailSetting);
            // Pasa los datos a la vista, dependiendo de si se encontró o no la configuración y cuál es el tab activo
            return view('settingss.emailsregister', [
                'property' => $property, // Pasamos la propiedad a la vista
                'emailSetting' => $defaultEmailSetting ?? null,
                'property_code' => $property_code,
            ]);
        }

        // Si se encontró la configuración en la tabla `emails_settings`, pasa los datos a la vista
        return view('settingss.emailsregister', compact('property', 'emailSetting', 'property_code'));
    }

    public function updateregisterEmail(Request $request)
    {
        // Validar los datos del formulario si es necesario
        $request->validate([
            'email_content' => 'required',
            'property_code' => 'required', // Agrega una validación para property_code
        ]);

        // Obtener el property_code del formulario
        $property_code = $request->input('property_code');

        // Buscar la configuración de correo electrónico existente por property_code
        $emailSetting = EmailRegisterVehicle::where('property_code', $property_code)->first();

        // Si no se encuentra la configuración, crea una nueva instancia
        if (!$emailSetting) {
            $emailSetting = new EmailRegisterVehicle();
            $emailSetting->property_code = $property_code;
        }

        // Actualizar la configuración de correo electrónico
        $emailSetting->email_content = $request->input('email_content');
        $emailSetting->save();

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->route('obtener-email-register', ['property_code' => $property_code])->with('success_message', 'Configuración de correo electrónico actualizada correctamente.');
    }
    public function expiredEmail($property_code)
    {
        // Intenta obtener la propiedad por su código
        $property = Property::where('property_code', $property_code)->first();

        // Si no se encuentra la propiedad, redirige o maneja el error según tus necesidades
        if (!$property) {
            // Manejar el caso cuando no se encuentra la propiedad
            return redirect()->route('pagina_de_error')->with('error', 'La propiedad no existe.');
        }

        // Ahora, intenta obtener la configuración de correo electrónico para la propiedad
        $emailSetting = EmailExpired::where('property_code', $property_code)->first();
        //dd($emailSetting);
        // Si no se encuentra la configuración en la tabla `emails_settings`, intenta obtener los valores predeterminados
        if (!$emailSetting) {
            $defaultEmailSetting = DefaultEmailExpired::first();
            //dd($defaultEmailSetting);
            // Pasa los datos a la vista, dependiendo de si se encontró o no la configuración y cuál es el tab activo
            return view('settingss.emailexpired', [
                'property' => $property, // Pasamos la propiedad a la vista
                'emailSetting' => $defaultEmailSetting ?? null,
                'property_code' => $property_code,
            ]);
        }

        // Si se encontró la configuración en la tabla `emails_settings`, pasa los datos a la vista
        return view('settingss.emailexpired', compact('property', 'emailSetting', 'property_code'));
    }

    public function updateexpiredEmail(Request $request)
    {
        // Validar los datos del formulario si es necesario
        $request->validate([
            'email_content' => 'required',
            'property_code' => 'required', // Agrega una validación para property_code
        ]);

        // Obtener el property_code del formulario
        $property_code = $request->input('property_code');

        // Buscar la configuración de correo electrónico existente por property_code
        $emailSetting = EmailExpired::where('property_code', $property_code)->first();

        // Si no se encuentra la configuración, crea una nueva instancia
        if (!$emailSetting) {
            $emailSetting = new EmailExpired();
            $emailSetting->property_code = $property_code;
        }

        // Actualizar la configuración de correo electrónico
        $emailSetting->email_content = $request->input('email_content');
        $emailSetting->save();

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->route('obtener-email-expired', ['property_code' => $property_code])->with('success_message', 'Configuración de correo electrónico actualizada correctamente.');
    }

    public function welcomeEmail($property_code)
    {
        // Intenta obtener la propiedad por su código
        $property = Property::where('property_code', $property_code)->first();

        // Si no se encuentra la propiedad, redirige o maneja el error según tus necesidades
        if (!$property) {
            // Manejar el caso cuando no se encuentra la propiedad
            return redirect()->route('pagina_de_error')->with('error', 'La propiedad no existe.');
        }

        // Ahora, intenta obtener la configuración de correo electrónico para la propiedad
        $emailSetting = EmailWelcome::where('property_code', $property_code)->first();
        //dd($emailSetting);
        // Si no se encuentra la configuración en la tabla `emails_settings`, intenta obtener los valores predeterminados
        if (!$emailSetting) {
            $defaultEmailSetting = DefaultEmailWelcome::first();
            //dd($defaultEmailSetting);
            // Pasa los datos a la vista, dependiendo de si se encontró o no la configuración y cuál es el tab activo
            return view('settingss.emailwelcome', [
                'property' => $property, // Pasamos la propiedad a la vista
                'emailSetting' => $defaultEmailSetting ?? null,
                'property_code' => $property_code,
            ]);
        }

        // Si se encontró la configuración en la tabla `emails_settings`, pasa los datos a la vista
        return view('settingss.emailwelcome', compact('property', 'emailSetting', 'property_code'));
    }

    public function updatewelcomeEmail(Request $request)
    {
        // Validar los datos del formulario si es necesario
        $request->validate([
            'email_content' => 'required',
            'property_code' => 'required', // Agrega una validación para property_code
        ]);

        // Obtener el property_code del formulario
        $property_code = $request->input('property_code');

        // Buscar la configuración de correo electrónico existente por property_code
        $emailSetting = EmailWelcome::where('property_code', $property_code)->first();

        // Si no se encuentra la configuración, crea una nueva instancia
        if (!$emailSetting) {
            $emailSetting = new EmailWelcome();
            $emailSetting->property_code = $property_code;
        }

        // Actualizar la configuración de correo electrónico
        $emailSetting->email_content = $request->input('email_content');
        $emailSetting->save();

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->route('obtener-email-welcome', ['property_code' => $property_code])->with('success_message', 'Configuración de correo electrónico actualizada correctamente.');
    }

    public function welcomeManagerEmail($property_code)
    {
        // Intenta obtener la propiedad por su código
        $property = Property::where('property_code', $property_code)->first();

        // Si no se encuentra la propiedad, redirige o maneja el error según tus necesidades
        if (!$property) {
            // Manejar el caso cuando no se encuentra la propiedad
            return redirect()->route('pagina_de_error')->with('error', 'La propiedad no existe.');
        }

        // Ahora, intenta obtener la configuración de correo electrónico para la propiedad
        $emailSetting = EmailWelcomeManager::where('property_code', $property_code)->first();
        //dd($emailSetting);
        // Si no se encuentra la configuración en la tabla `emails_settings`, intenta obtener los valores predeterminados
        if (!$emailSetting) {
            $defaultEmailSetting = DefaultEmailWelcomeManage::first();
            //dd($defaultEmailSetting);
            // Pasa los datos a la vista, dependiendo de si se encontró o no la configuración y cuál es el tab activo
            return view('settingss.emailwelcome_manager', [
                'property' => $property, // Pasamos la propiedad a la vista
                'emailSetting' => $defaultEmailSetting ?? null,
                'property_code' => $property_code,
            ]);
        }

        // Si se encontró la configuración en la tabla `emails_settings`, pasa los datos a la vista
        return view('settingss.emailwelcome_manager', compact('property', 'emailSetting', 'property_code'));
    }

    public function updatewelcomemanageEmail(Request $request)
    {
        // Validar los datos del formulario si es necesario
        $request->validate([
            'email_content' => 'required',
            'property_code' => 'required', // Agrega una validación para property_code
        ]);

        // Obtener el property_code del formulario
        $property_code = $request->input('property_code');

        // Buscar la configuración de correo electrónico existente por property_code
        $emailSetting = EmailWelcomeManager::where('property_code', $property_code)->first();

        // Si no se encuentra la configuración, crea una nueva instancia
        if (!$emailSetting) {
            $emailSetting = new EmailWelcomeManager();
            $emailSetting->property_code = $property_code;
        }

        // Actualizar la configuración de correo electrónico
        $emailSetting->email_content = $request->input('email_content');
        $emailSetting->save();

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->route('obtener-email-welcome-manager', ['property_code' => $property_code])->with('success_message', 'Configuración de correo electrónico actualizada correctamente.');
    }

}
