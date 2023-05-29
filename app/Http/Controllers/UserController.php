<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function index()
    {
        $users = Users::all();
        return response()->json($users);
    }


    public function register(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = Users::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'access_token' => $accessToken]);
    }
}
