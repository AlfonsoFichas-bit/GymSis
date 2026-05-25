<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => true], $request->boolean('remember'))) {
            $request->session()->regenerate();

            return response()->json([
                'message' => 'Inicio de sesión exitoso.',
                'user' => Auth::user(),
            ]);
        }

        throw ValidationException::withMessages([
            'email' => ['Las credenciales no coinciden o el usuario está inactivo.'],
        ]);
    }
}
