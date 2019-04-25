<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        if ($request->input('phone')) {
            try {

                $phoneNumber = $request->input('phone');

                $email = ($request->input('email'))? $request->input('email') : $phoneNumber.'@golf.vn';
                $name  =  ($request->input('name'))? $request->input('name') : 'User with phone '.$phoneNumber;

                $user = User::create([
                    'email'    => $email,
                    'password' => bcrypt('strong_password'),
                    'name' => $name,
                    'phone' =>  $phoneNumber,
                    'is_admin' => false
                ]);

                $token = auth('api')->login($user);

                return response()->json([
                    'token' => $token,
                    'expires' => auth('api')->factory()->getTTL() * 60,
                ]);
            } catch (\Exception $exception) {
               return response()->json([
                    'token' => null,
                    'error' => 'Failed to create user with phone='.$request->input('phone')
                ]);
            }
        }

        return response()->json([
            'token' => null,
            'error' => 'No phone param'
        ]);


    }

    public function login() {

        $user = User::where('is_active', true)
            ->where('phone', request()->input('phone'))
            ->first();

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json([
            'token' => auth('api')->login($user),
            'expires' => auth('api')->factory()->getTTL() * 60,
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'token' => auth('api')->refresh(),
            'expires' => auth('api')->factory()->getTTL() * 60,
        ]);
    }
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}