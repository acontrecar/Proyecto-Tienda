<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product_stock;

class ProductStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products_stock = Product_stock::all();

        $data = [
            'status' => 200,
            'products_stock' => $products_stock
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
            'product_id' => 'required|exists:products,product_id',
            'size_id' => 'required|exists:sizes,size_id',
            'quantity' => 'required|integer',
        ]);

        if ($validator->fails()) {
            $data = [
                'status' => 400,
                'errors' => $validator->errors(),
            ];
            return response()->json($data, $data['status']);
        }

        $product_stock = Product_stock::create([
            'product_id' => $request->product_id,
            'size_id' => $request->size_id,
            'quantity' => $request->quantity,
        ]);

        $data = [
            'status' => 201,
            'product_stock' => $product_stock,
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
