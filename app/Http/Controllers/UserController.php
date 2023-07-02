<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use \stdClass;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //Si no es admin no puede crear productos
        $user = auth()->user();

        if (!$user || $user->role != 'ROLE_ADMIN') {
            $data = [
                'status' => 401,
                'message' => 'Unauthorized',
            ];
            return response()->json($data, $data['status']);
        }

        $users = User::all();

        return response()->json([
            'status' => 200,
            'message' => 'Users list',
            'data' => $users,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'email|required|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                // Pattern para minimo una mayuscula y un numero
                'regex:/^(?=.*[A-Z])(?=.*\d).+$/'
            ],

        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 400,
                'message' => 'Error creating user',
                'data' => $validator->errors(),
            ];
            return response()->json($data, $data['status']);
        }

        $pwd = password_hash($request->password, PASSWORD_BCRYPT, ['cost' => 4]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $pwd,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        $data = [
            'status' => 200,
            'message' => 'User created successfully',
            'data' => $user,
            'token' => $token,
        ];

        return response()->json($data, $data['status']);
    }

    /**
     * Login user and create token
     */

    public function login(Request $request)
    {

        if (!Auth::attempt($request->only('email', 'password'))) {

            $data = [
                'status' => 401,
                'message' => 'Unauthorized',
            ];
            return response()->json($data, $data['status']);
        }

        $user = User::where('email', $request->email)->firstorFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        $data = [
            'status' => 200,
            'message' => 'User logged in successfully',
            'data' => $user,
            'token' => $token,
        ];

        return response()->json($data, $data['status']);
    }

    /**
     * Logout user (Revoke the token)
     */
    public function logout(Request $request)
    {
        //
        auth()->user()->tokens()->delete();

        $data = [
            'status' => 200,
            'message' => 'User logged out successfully',
        ];

        return response()->json($data, $data['status']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
