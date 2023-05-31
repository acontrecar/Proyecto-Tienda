<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Subcategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $products = Product::all();

        $data = [
            'status' => 200,
            'message' => 'Products list',
            'data' => $products,
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

        //Si no es admin no puede crear productos
        $user = auth()->user();

        if (!$user || $user->role != 'ROLE_ADMIN') {
            $data = [
                'status' => 401,
                'message' => 'Unauthorized',
            ];
            return response()->json($data, $data['status']);
        }

        //Validar json
        $arrayJson = json_decode($request->json, true);

        $validator = Validator::make($arrayJson, [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'subcategory_id' => 'required|exists:subcategories,subcategory_id',
        ]);


        if ($validator->fails()) {
            $data = [
                'status' => 400,
                'message' => 'Validation json error',
                'data' => $validator->errors(),
            ];

            return response()->json($data, $data['status']);
        }


        //Validar imagen
        $validatorImage = Validator::make($request->allFiles(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        if ($validatorImage->fails() || !$image) {
            $data = [
                'status' => 400,
                'message' => 'Validation image error',
                'data' => $validatorImage->errors(),
            ];

            return response()->json($data, $data['status']);
        }

        $imageName = time() . '.' . $image->extension();
        $image->storeAs('productsImage', $imageName);

        $product = Product::create([
            'name' => $arrayJson['name'],
            'description' => $arrayJson['description'],
            'price' => (float) $arrayJson['price'],
            'image' => $imageName,
            'subcategory_id' => $arrayJson['subcategory_id'],
        ]);

        $data = [
            'status' => 201,
            'message' => 'Product created',
            'data' => $product,
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
