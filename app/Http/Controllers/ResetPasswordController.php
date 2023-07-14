<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token)
    {
        return view('auth.passwords.reset', ['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $response = $this->broker()->reset(
            $this->credentials($request),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            // Si la contraseña se restableció correctamente, puedes realizar alguna acción adicional aquí, como redirigir al usuario a una página de inicio de sesión.
            return redirect()->route('login')->with('status', trans($response));
        } else {
            return back()->withErrors(['email' => trans($response)]);
        }
    }

    protected function resetPassword($user, $password)
    {
        $user->password = bcrypt($password);
        $user->save();

        Auth::login($user);
    }

    protected function credentials(Request $request)
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }

    protected function broker()
    {
        return Password::broker();
    }
}
