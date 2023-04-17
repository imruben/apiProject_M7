<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
        ]);

        $validatedData['password'] = Hash::make($request->password);

        $user = User::create($validatedData);

        $accesToken = $user->createToken('authToken')->accessToken;

        return response(
            [
                'user' => $user,
                'access_token' => $accesToken
            ]
        );
    }

    public function login(Request $request)
    {

        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid credentials']);
        }

        $user = User::find(auth()->user()->id);

        $accesToken = $user->createToken('authToken')->accessToken;

        return response(
            [
                'user' => auth()->user(),
                'access_token' => $accesToken
            ]
        );
    }
}
