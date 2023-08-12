<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

// Asegúrate de importar el modelo Department

class TermsAndConditionsController extends Controller
{
    public function openTermsAndConditions($token)
    {
        $user = User::whereHas('department', function ($query) use ($token) {
            $query->where('agreement_token', $token);
        })->first();

        if ($user) {
            // Actualiza el estatus en el registro de departments asociado al usuario
            $department = Department::where('user_id', $user->id)->first();
            if ($department) {
                $department->terms_agreement_status = 'opened'; // Cambia a 'opened'
                $department->save();
            }

            // Cargar la vista de términos y condiciones
            return view('terms_and_conditions', compact('user'));
        } else {
            // Maneja el caso cuando el token no es válido
            return redirect()->route('otra-ruta-de-error');
        }
    }

    public function acceptTermsAndConditions(Request $request, $token)
    {
        $user = User::whereHas('department', function ($query) use ($token) {
            $query->where('agreement_token', $token);
        })->first();

        if ($user) {
            // Actualiza el estatus en el registro de departments asociado al usuario
            $department = Department::where('user_id', $user->id)->first();
            if ($department && $department->terms_agreement_status === 'opened') {
                $department->terms_agreement_status = 'accepted'; // Cambia a 'accepted'
                
                // Guarda la fecha y hora de aceptación en el campo date_status
                $department->date_status = now(); // Esto utilizará la fecha y hora actual
                
                $department->save();
        
                // Aquí puedes redirigir a donde desees después de aceptar los términos
                return redirect()->route('login');
            
        }
        
        }

        // Maneja el caso cuando el token no es válido
        return redirect()->route('otra-ruta-de-error');
    }
}
