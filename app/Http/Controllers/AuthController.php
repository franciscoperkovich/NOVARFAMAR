<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 

class AuthController extends Controller
{
    public function formularioRegistro()
    {
        return view('backend.usuarios.registro');
    }

    public function formularioLogin()
    {
        return view('backend.usuarios.login');
    }

    public function registrar(Request $request)
    {
        $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|string|email|max:255|unique:users',
    'password' => 'required|string|min:6|confirmed',
]);

User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
    'rol' => 'cliente',
]);
        

        return redirect('/login')->with('success', '¡Usuario creado con éxito!');
    }

public function autenticar(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {

        $user = Auth::user();

        if (!$user->activo) {

            Auth::logout();

            return back()->withErrors([
                'email' => 'La cuenta se encuentra deshabilitada.'
            ]);
        }

        $request->session()->regenerate();

        if ($user->rol === 'admin' || $user->rol === 'superadmin') {
    return redirect('/admin/dashboard');
}

return redirect('/');

    return back()->withErrors([
        'email' => 'Las credenciales no coinciden.'
    ]);
}
}
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}