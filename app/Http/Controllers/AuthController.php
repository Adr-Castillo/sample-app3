<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {

        info('Registration request data:', $request->all());


        $data = $request->validate([
            "name"=>["required","string",],
            "email"=> ["required", "email","unique:users"],
            "password"=> ["required", "min:5"],

        ]);

        $user = User::create($data);

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];

    }

    public function login(Request $request) {

        $data = $request->validate([
            "email"=> ['required', 'email','exists:users'],
            "password"=> ['required', 'min:5'],

        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response([
                'message' => 'Bad Credentials provided.'
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];

    }
}
