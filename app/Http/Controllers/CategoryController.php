<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $categories = Category::all();

        $data = [
            'status' => 200,
            'message' => 'Categories list',
            'categories' => $categories,
        ];

        return response()->json($data, $data['status']);
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

        if (!$user || $user->role != 'ROLE_ADMIN') {
            $data = [
                'status' => 401,
                'message' => 'Unauthorized',
            ];
            return response()->json($data, $data['status']);
        }


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 400,
                'message' => 'Error creating category',
                'data' => $validator->errors(),
            ];
            return response()->json($data, $data['status']);
        }

        $category = Category::create([
            'name' => $request->name,
        ]);

        $data = [
            'status' => 200,
            'message' => 'Category created successfully',
            'category' => $category,
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
