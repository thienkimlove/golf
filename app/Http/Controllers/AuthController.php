<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContentResource;
use App\Http\Resources\MessageResource;
use App\Models\Content;
use App\Models\Message;
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
                $desc  =  ($request->input('desc'))? $request->input('desc') : '';
                $organization_id  =  ($request->input('organization_id'))? $request->input('organization_id') : null;


                $user = User::create([
                    'email'    => $email,
                    'password' => bcrypt('strong_password'),
                    'name' => $name,
                    'phone' =>  $phoneNumber,
                    'organization_id' => $organization_id,
                    'desc' => $desc,
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

    public function contents()
    {
        if ($currentUser = auth('api')->user()) {
            return ContentResource::collection(
                Content::where('user_id', $currentUser->id)
                    ->paginate(25)
            );
        }
    }

    public function messages()
    {
        if ($currentUser = auth('api')->user()) {
            return MessageResource::collection(
                Message::where('send_user_id', $currentUser->id)
                    ->orWhere('receiver_user_id', $currentUser->id)
                    ->paginate(25)
            );
        }
    }

    public function updateMe(Request $request)
    {
        if ($currentUser = auth('api')->user()) {
            try {

                if ($request->input('email')) {
                    $currentUser->email = $request->input('email');
                }
                if ($request->input('name')) {
                    $currentUser->name = $request->input('name');
                }
                if ($request->input('desc')) {
                    $currentUser->desc = $request->input('desc');
                }
                if ($request->input('organization_id')) {
                    $currentUser->organization_id = $request->input('organization_id');
                }

                $currentUser->save();
                return response()->json($currentUser);
            } catch (\Exception $exception) {
                return response()->json([
                    'error' => 'Failed to update user!'
                ]);
            }
        }

        return response()->json([
            'token' => null,
            'error' => 'No phone param'
        ]);
    }

    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}