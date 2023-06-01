<?php

namespace App\Http\Controllers;

use App\Models\Order_detail as OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ordersDetails = OrderDetails::all();

        $data = [
            'status' => 200,
            'message' => 'Orders details list',
            'data' => $ordersDetails,
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

        // $user = auth()->user();

        // if (
        //     !$user
        // ) {
        //     $data = [
        //         'status' => 401,
        //         'message' => 'Unauthorized',
        //     ];
        //     return response()->json($data, $data['status']);
        // }


        // /*
        // Necesario, guardar userId, productsId, quantity, price, status = 'pending'
        // */
        // $idUSer = $user->user_id;
        // $productsId = $request->productsId;
        // $quantity = $request->quantity;
        // $totalPrice = $request->totalPrice;

        // $validator = Validator::make($request->all(), [
        //     'productsId' => 'required|integer',
        //     'quantity' => 'required|integer',
        //     'totalPrice' => 'required|numeric',
        // ]);

        // if ($validator->fails()) {
        //     $data = [
        //         'status' => 400,
        //         'message' => 'Bad request',
        //     ];
        //     return response()->json($data, $data['status']);
        // }

        //return response()->json($data, $data['status']);
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
