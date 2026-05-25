<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function __invoke(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        return response()->json([
            'message' => 'Usuario creado exitosamente.',
            'user' => $user,
        ], 201);
    }
}
