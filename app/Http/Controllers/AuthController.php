<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Carga la vista de login
     *
     * @return void
     */
    public function verFormLogin()
    {
        return view('auth.login');
    }

    /**
     * Ejecuta el logueo
     *
     * @param Request $request
     * @return redirect
     */
    public function doLogin(Request $request)
    {
        $request->validate(Usuario::$loginRules);

        $input = $request->except(['_token']);

        if (Auth::attempt(['password' => $input['password'], 'email' => $input['email']])) {
            return redirect()
                ->route('app.home')
                ->with('message', 'Bienvenido!');
        } else {
            return redirect()
                ->route('login')
                ->withInput()
                ->with('loginError', 'Usuario y/o contraseña incorrectos.');
        }
    }

    /**
     * Ejecuta el logout
     *
     * @return redirect
     */
    public function doLogout()
    {
        Auth::logout();
        return redirect()
            ->route('app.home')
            ->with('message', 'La sesión se cerró exitosamente.');
    }

    /**
     * Abre a vista de registro
     *
     * @return view
     */
    public function verRegistro()
    {
        return view('auth.registro');
    }

    /**
     * Ejecuta el registro
     *
     * @param Request $request
     * @return view
     */
    public function doRegistro(Request $request)
    {

        $request->validate(Usuario::$loginRules);
        $formData = $request->except(['_token']);

        $formData['is_admin'] = 0;
        $pass = Hash::make($formData['password']);
        $formData['password'] = $pass;

        $user = Usuario::create($formData);

        auth()->login($user);

        return redirect()
            ->route('app.home')
            ->with('message', 'Tu registro fue exitoso!')
            ->with('loginError', 'Error en los datos');

    }
}
