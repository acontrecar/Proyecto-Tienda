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
        $image->storeAs('', $imageName, 'productsImage');


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
     * Return a list of products by category.
     */

    public function productsBySubCategory(string $subcategory_id)
    {

        $validator = Validator::make(['subcategory_id' => $subcategory_id], [
            'subcategory_id' => 'required|exists:subcategories,subcategory_id',
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 400,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ];

            return response()->json($data, $data['status']);
        }

        $products = Product::whereHas('subcategory', function ($query) use ($subcategory_id) {
            $query->where('subcategory_id', $subcategory_id);
        })->get();

        $data = [
            'status' => 200,
            'message' => 'Products list',
            'data' => $products,
        ];

        return response()->json($data, $data['status']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $product = Product::find($id);

        if (!$product) {
            $data = [
                'status' => 404,
                'message' => 'Product not found',
            ];

            return response()->json($data, $data['status']);
        }

        $data = [
            'status' => 200,
            'message' => 'Product found',
            'data' => $product,
        ];

        return response()->json($data, $data['status']);
    }

    /**
     * Display the specified products by size.
     */
    public function showBySize(string $id, string $size_id)
    {

        $product = Product::find($id);

        if (!$product) {
            $data = [
                'status' => 404,
                'message' => 'Product not found',
            ];

            return response()->json($data, $data['status']);
        }

        $validator = Validator::make(['size_id' => $size_id], [
            'size_id' => 'required|exists:products_stock,size_id,product_id,' . $id,
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 400,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ];

            return response()->json($data, $data['status']);
        }

        $quantity = $product->getQuantityBySize($size_id);

        $data = [
            'status' => 200,
            'message' => 'Product found',
            'quantity' => $quantity,
            'product' => $product,
            'size' => $size_id,
        ];

        return response()->json($data, $data['status']);
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
