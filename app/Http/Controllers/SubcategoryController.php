<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $subcategories = Subcategory::all();

        $data = [
            'subcategories' => $subcategories
        ];

        return response()->json($data, 200);
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
        //
        $user = auth()->user();

        if (
            !$user || $user->role != 'ROLE_ADMIN'
        ) {
            $data = [
                'status' => 401,
                'message' => 'Unauthorized',
            ];
            return response()->json($data, $data['status']);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,category_id',
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 400,
                'message' => 'Bad request',
                'errors' => $validator->errors()
            ];
            return response()->json($data, $data['status']);
        }

        $subcategory = Subcategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id
        ]);

        $data = [
            'status' => 201,
            'message' => 'Subcategory created',
            'data' => $subcategory
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
