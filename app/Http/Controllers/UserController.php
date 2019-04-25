<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::paginate(25));
    }


    public function show(User $book)
    {
        return new UserResource($book);
    }

    public function destroy(User $book)
    {

        return response()->json(['error' => 'Do not have permission'], 403);
    }
}
